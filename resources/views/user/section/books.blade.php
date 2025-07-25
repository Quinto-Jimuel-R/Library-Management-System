@extends('user.main_layout')

@section('head')

@endsection

@section('breadcrumbs')
<nav class="text-white text-sm" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex space-x-2">
        <li class="flex items-center">
            <a href="{{ route('users.book') }}" class="text-white">Book</a>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="text-white bg-[#1c2541] p-5 rounded">

    @foreach ($notReturnBook as $borrow)
        <div class="bg-[#3a506b] p-2 mb-2 rounded text-white">
            {{ $borrow->book->title }}
        </div>
    @endforeach

    <span class="text-red-600">{{ session('error') }}</span>
    
    
    <div class="flex justify-between mb-3 space-x-2 items-center">
        <!-- Search Bar -->
        <div class="relative w-full max-w-xs bg-[#3a506b] rounded-md">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-white"></i>

            <form action="{{ route('users.book.search') }}" method="GET">
                <input id="search" name="search" type="text" value="{{ request('search') }}" placeholder="Search..." class="pl-10 pr-3 py-1.5 rounded-md w-full text-sm focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none" />
            </form>
        </div>
    </div>

    <div class="border border-b-0 text-sm text-left">

        <table class="table-auto min-w-full text-sm text-left text-white">
            <thead class="text-xs uppercase">
                <tr class="border-b-1">
                    <th class="p-4">Book Code</th>
                    <th class="p-4">Title</th>
                    <th class="p-4">Genre</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @forelse ( $books as $book )
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
                    <td class="p-4">{{ $book->genre }}</td>
                    <td class="p-4 text-center">
                        <form action="{{ route('users.book.borrow', ['id' => $book->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 p-2 rounded hover:bg-blue-600 cursor-pointer"> <i class="fa-solid fa-handshake-angle w-5"></i> Borrow</button>
                        </form>    
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

@endsection