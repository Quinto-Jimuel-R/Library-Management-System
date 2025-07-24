<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class UsersController extends Controller
{
    public function book()
    {
        $books = Book::where('status', '=', 'Available')->paginate(10);
        return view('user.section.book', compact('books'));
    }
}
