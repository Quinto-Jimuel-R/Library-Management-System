<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Book;

class BookController extends Controller
{
    public function createBook()
    {
        do{
            $code = mt_rand(1, 9999999999);
        } while(Book::where('book_code', $code)->exists());

        return view('admin.section.store.create-book', compact('code'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'book_code' => ['required', 'string', Rule::unique('books', 'book_code')],
            'title' => ['required', 'string', 'max:100', Rule::unique('books', 'title')],
            'author' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string'],
        ]);

        $book = Book::create([
            'book_code' => $request->book_code,
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
        ]);

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

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'author' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string'],
        ]);

        $book = Book::findOrFail($id);
        $book_data = [
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
        ];

        $book->update($book_data);

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
