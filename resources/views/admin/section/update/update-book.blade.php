@extends('admin.main_layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('breadcrumbs')
<nav class="text-white text-sm" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex space-x-2">
        <li class="flex items-center">
            <a href="{{ route('admin.books') }}" class="text-white">Books</a>
            <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M7.05 4.05a.75.75 0 011.06 0l5.25 5.25a.75.75 0 010 1.06l-5.25 5.25a.75.75 0 01-1.06-1.06L11.44 10 7.05 5.61a.75.75 0 010-1.06z" />
            </svg>
        </li>
        <li class="flex items-center">
            <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="text-white">Update Book</a>
            <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M7.05 4.05a.75.75 0 011.06 0l5.25 5.25a.75.75 0 010 1.06l-5.25 5.25a.75.75 0 01-1.06-1.06L11.44 10 7.05 5.61a.75.75 0 010-1.06z" />
            </svg>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="text-white bg-[#1c2541] p-5 rounded">

    <div class="flex justify-between mb-4">
        <div class="flex items-center">
            <h2 class="text-lg font-medium">Books</h2>
        </div>
    </div>

    <div class="flex flex-col md:flex-row m-0 mb-2 md:mb-0">
        <div class="w-full">
            <form action="{{ route('book.update', ['id' => $book->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="block text-sm font-medium text-white">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                    @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="block text-sm font-medium text-white">Author</label>
                    <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                    @error('author')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="genre" class="block text-sm font-medium text-white">Genre</label>
                    <input type="text" id="genre" name="genre" value="{{ old('genre', $book->genre) }}" class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                    @error('genre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full md:w-auto bg-green-500 text-white rounded p-2 cursor-pointer">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection