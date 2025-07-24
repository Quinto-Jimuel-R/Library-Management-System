<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_books = Book::count();
        $total_borrowed = Book::where('status', '=', 'borrowed')->count();
        $total_overdue = Book::where('status', '=', 'overdue')->count();
        $total_users = User::where('role', 'user')->count();
        return view('admin.section.dashboard', compact('total_books', 'total_borrowed', 'total_overdue', 'total_users'));
    }

    public function books()
    {
        $books = Book::orderBy('id', 'desc')->paginate(10);
        return view('admin.section.books', compact('books'));
    }

    public function reports()
    {
        return view('admin.section.reports');
    }

    public function users()
    {
        $users = User::where('role', 'user')->orderBy('id', 'desc')->paginate(10);
        return view('admin.section.users', compact('users'));
    }
}
