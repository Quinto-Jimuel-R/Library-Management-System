<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowed;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $books = Book::where('status', 'Available')
            ->where(function ($query) use ($search) {
                $query->where('book_code', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->appends(['search' => $search]);

        $user_id = Auth::id();

        $notReturnBook = Borrowed::with('book')
            ->where('user_id', $user_id)
            ->whereNull('return_date')
            ->get();

        return view('user.section.books', compact('books', 'search', 'notReturnBook'));
    }

    public function borrow($id)
    {
        $user_id = Auth::id();

        $hasUnreturned = Borrowed::where('user_id', $user_id)
            ->whereNull('return_date')
            ->exists();

        if ($hasUnreturned) {
            return redirect()->back()->with('error', 'You must return your current book before borrowing another.');
        }

        $book = Book::findOrFail($id);

        Borrowed::create([
            'user_id' => $user_id,
            'book_id' => $book->id,
            'borrow_date' => now(),
            'due_date' => now()->addDays(7),
        ]);

        $book->update([
            'status' => 'Borrowed',
        ]);

        return redirect()->route('users.book')->with('success', 'Borrowed Successfully');
    }

    public function return($borrow_id)
    {
        $returnBook = Borrowed::findOrFail($borrow_id);

        $returnBook->update([
            'return_date' => now(),
        ]);

        $book_id = $returnBook->book_id;

        $book = Book::findOrFail($book_id);
        $book->update([
            'status' => 'Available',
        ]);

        return redirect()->route('users.book')->with('success', 'Returned Successfully');
    }
}
