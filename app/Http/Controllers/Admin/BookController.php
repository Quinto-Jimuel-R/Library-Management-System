<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function createBook()
    {
        do{
            $code = mt_rand(1, 9999999999);
        } while(Book::where('book_code', $code)->exists());

        return view('admin.section.store.create-book', compact('code'));
    }

    public function create(BookRequest $request)
    {

        $book = Book::create($request->only('book_code', 'title', 'author', 'genre'));

        $book_code = $book->book_code;

        return view('admin.section.barcode-print', compact('book_code'));
    }

    public function print($book_code)
    {
        return view('admin.section.barcode-print', compact('book_code'));
    }

    public function editBook($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.section.update.update-book', compact('book'));
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->update($request->only('title', 'author', 'genre'));

        return redirect()->route('admin.books')->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $books = Book::where('book_code', 'like', "%{$search}%")
            ->orWhere('title', 'like', "%{$search}%")
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('admin.section.books', compact('books', 'search'));
    }
}
