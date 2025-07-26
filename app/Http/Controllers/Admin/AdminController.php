<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowed;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_books = Book::count();
        $total_borrowed = Book::where('status', '=', 'borrowed')->count();
        $total_overdue = Book::where('status', '=', 'overdue')->count();
        $total_users = User::where('role', 'user')->count();
        $top_books = Borrowed::select('book_id', DB::raw('COUNT(*) as borrow_count'))
        ->groupBy('book_id')
        ->orderByDesc('borrow_count')
        ->limit(5)
        ->with('book')->get();

        return view('admin.section.dashboard', compact('total_books', 'total_borrowed', 'total_overdue', 'total_users', 'top_books'));
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
