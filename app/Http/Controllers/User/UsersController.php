<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowed;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function books()
    {
        $books = Book::where('status', 'Available')
        ->orderBy('id', 'desc')
        ->paginate(10);
        $user_id = Auth::id();

        $notReturnBook = Borrowed::with('book')
        ->where('user_id', $user_id)
        ->whereNull('return_date')->get();
        
        return view('user.section.books', compact('books', 'notReturnBook'));
    }
}
