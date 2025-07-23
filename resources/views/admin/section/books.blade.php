@extends('admin.main_layout')

@section('head')
@endsection

@section('breadcrumbs')
<nav class="text-white text-sm" aria-label="Breadcrumb">
  <ol class="list-none p-0 inline-flex space-x-2">
    <li class="flex items-center">
      <a href="{{ route('admin.books') }}" class="text-white">Books</a>
    </li>
  </ol>
</nav>
@endsection

@section('content')
<div class="text-white bg-[#1c2541] p-5 rounded">

    <div class="flex justify-between mb-3 space-x-2 items-center">
        <!-- Search Bar -->
        <div class="relative w-full max-w-xs bg-[#3a506b] rounded-md">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-white"></i>

            <form action="{{ route('book.search') }}" method="GET">
                <input id="search" name="search" type="text" value="{{ request('search') }}" placeholder="Search..." class="pl-10 pr-3 py-1.5 rounded-md w-full text-sm focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none" />
            </form>
        </div>

        <div class="flex items-center justify-end gap-1 relative">
            <!-- Create Book Button -->
            <div class="relative inline-block">
                <a href="{{ route('book.create') }}">
                    <button class="bg-[#3a506b] text-white text-sm rounded-md cursor-pointer hover:bg-white hover:text-[#0b132b] focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none px-4 py-2 h-8 flex items-center w-full md:w-auto">
                        <i class="fa-solid fa-plus mr-0 lg:mr-2"></i> <span class="hidden lg:block">Create Book</span>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="border border-b-0 text-sm text-left">

        <table class="table-auto min-w-full text-sm text-left text-white">
            <thead class="text-xs uppercase">
                <tr class="border-b-1">
                    <th class="p-4">Book Code</th>
                    <th class="p-4">Title</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @forelse ($books as $book)
                <tr class="border-b-1">
                    <td class="p-4">{{ $book->book_code }}</td>
                    <td class="p-4">
                        <div class="flex flex-col space-y-1">
                            <div class="font-bold">
                                {{ $book->title }}
                            </div>
                            <div>
                                {{ $book->author }}
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="inline-block px-2 py-1 rounded font-semibold text-xs
                                    @if ($book->status === 'Available') bg-green-100 text-green-800
                                    @elseif ($book->status === 'Reserved') bg-yellow-100 text-yellow-800
                                    @elseif ($book->status === 'Borrowed') bg-blue-100 text-blue-800
                                    @elseif ($book->status === 'Overdue') bg-red-100 text-red-800
                                    @elseif ($book->status === 'Lost') bg-gray-200 text-gray-800
                                    @endif">
                            {{ $book->status }}
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="flex flex-row justify-center space-x-3">
                            <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="outline-none">
                                <button class="py-1 px-2 cursor-pointer rounded bg-green-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                             </a>
                            <form action="{{ route('book.delete', ['id' => $book->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="outline-none">
                                    <button type="submit" class="py-1 px-2 cursor-pointer rounded bg-red-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </a>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="text-center border-b-1">
                    <td colspan="4" class="p-4">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-white">
        {{ $books->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/book.js') }}"></script>
@endsection