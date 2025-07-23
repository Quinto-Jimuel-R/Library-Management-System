@extends('admin.main_layout')

@section('head')

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
            <a href="{{ route('book.create') }}" class="text-white">Create Book</a>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="text-white bg-[#1c2541] p-5 rounded">

    <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <div class="flex flex-col md:flex-row m-0 mb-2 md:mb-0">
            <div class="w-full">
                <div class="mb-3">
                    <label for="book_code" class="block text-sm font-medium text-white">Book Code</label>
                    <input type="text" id="book_code" name="book_code" readonly value="{{ $code }}" class="block w-full tracking-widest text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                </div>
                <div class="mb-3">
                    <label for="title" class="block text-sm font-medium text-white">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                    @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="block text-sm font-medium text-white">Author</label>
                    <input type="text" id="author" name="author" value="{{ old('author') }}" class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                    @error('author')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="w-full flex justify-center items-center">
                <div class="bg-white p-2">
                    {!! DNS1D::getBarcodeHTML("$code", 'C128',2,70) !!}
                    <p class="text-center text-gray-900 tracking-widest">{{$code}}</p>
                </div>
            </div>

        </div>
        <button type="submit" class="w-full md:w-auto bg-green-500 text-white rounded p-2 cursor-pointer">
            Save
        </button>
    </form>

    <!-- {!! DNS1D::getBarcodeHTML("$code", 'C128',2,50) !!} -->
</div>
@endsection

@section('scripts')

@endsection