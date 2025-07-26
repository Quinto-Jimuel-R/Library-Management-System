<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\User\UsersController;
use App\Http\Controllers\User\BooksController;

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'loginForm'])->name('index');

    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth:admin', 'prevent-back-history'])->group(function () {
    //Sidebar Links
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/books', [AdminController::class, 'books'])->name('admin.books');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    //Book Links
    Route::get('/create/book', [BookController::class, 'createBook'])->name('book.create');
    Route::get('/edit/book-{id}', [BookController::class, 'editBook'])->name('book.edit');
    //CRUD Books
    Route::post('/store/book', [BookController::class, 'create'])->name('book.store');
    Route::post('/update/book-{id}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/delete/book-{id}', [BookController::class, 'delete'])->name('book.delete');
    //Additional Function
    Route::get('/search/book', [BookController::class, 'search'])->name('book.search');
    Route::get('/print/book/{book_code}', [BookController::class, 'print'])->name('barcode.print');

    //Users
    Route::get('/create/user', [UserController::class, 'createUser'])->name('user.create');
    //CRUD User
    Route::post('/store/user', [UserController::class, 'create'])->name('user.store');
    Route::delete('/delete/user-{id}', [UserController::class, 'delete'])->name('user.delete');
    
});

Route::prefix('user')->middleware(['auth:user', 'prevent-back-history'])->group(function () {
    Route::get('/book', [UsersController::class, 'books'])->name('users.book');

    Route::get('/search/book', [BooksController::class, 'search'])->name('users.book.search');
    Route::post('/book/borrow/{id}', [BooksController::class, 'borrow'])->name('users.book.borrow');
    Route::post('/return/{borrow_id}', [BooksController::class, 'return'])->name('users.book.return');
});
