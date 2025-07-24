@extends('admin.main_layout')

@section('head')

@endsection

@section('breadcrumbs')
<nav class="text-white text-sm" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex space-x-2">
        <li class="flex items-center">
            <a href="{{ route('admin.users') }}" class="text-white">Users</a>
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

            <form action="#" method="GET">
                <input id="search" name="search" type="text" value="" placeholder="Search..." class="pl-10 pr-3 py-1.5 rounded-md w-full text-sm focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none" />
            </form>
        </div>

        <div class="flex items-center justify-end gap-1 relative">
            <!-- Create Book Button -->
            <div class="relative inline-block">
                <a href="{{ route('user.create') }}">
                    <button class="bg-[#3a506b] text-white text-sm rounded-md cursor-pointer hover:bg-white hover:text-[#0b132b] focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none px-4 py-2 h-8 flex items-center w-full md:w-auto">
                        <i class="fa-solid fa-plus mr-0 lg:mr-2"></i> <span class="hidden lg:block">New User</span>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="border border-b-0 text-sm text-left">

        <table class="table-auto min-w-full text-sm text-left text-white">
            <thead class="text-xs uppercase">
                <tr class="border-b-1">
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @forelse ( $users as $user)
                <tr class="border-b-1">
                    <td class="p-4">{{ $user -> name }} 
                        @if ($user->created_at->gt(now()->subDay()))
                            <span class="rounded px-1 ms-1 bg-green-700 font-bold text-xs tracking-wide">New</span>
                        @endif
                    </td>
                    <td class="p-4">{{ $user -> email }}</td>
                    <td class="p-4 text-center">
                        <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-1 px-2 rounded bg-red-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                                <a href="#">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </button>
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

    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/book.js') }}"></script>
@endsection