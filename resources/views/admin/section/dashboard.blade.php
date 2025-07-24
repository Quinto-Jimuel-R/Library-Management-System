@extends('admin.main_layout')

@section('head')

@endsection

@section('breadcrumbs')
<nav class="text-white text-sm" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex space-x-2">
        <li class="flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-white">Dashboard</a>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="text-white">

    <div class="grid grid-cols-1 md:grid-cols-6 gap-3 mb-1">
        <!-- Left: Stats -->
        <div class="md:col-span-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3 p-5 rounded-md bg-[#1c2541] w-full">

                <!-- Total Books -->
                <div class="rounded bg-blue-500 text-white shadow hover:shadow-lg transition">
                    <div class="flex px-5 py-4 items-center justify-between">
                        <div>
                            <div class="text-sm font-semibold">Total Books</div>
                            <div class="text-2xl font-bold">{{ $total_books ?? 0 }}</div>
                        </div>
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-white text-blue-500">
                            <i class="fa-solid fa-book text-xl"></i>
                        </div>
                    </div>
                    <hr class="border-white border-opacity-20">
                    <a href="{{ route('admin.books') }}" class="block px-5 py-3 text-sm hover:bg-blue-600 transition">
                        <div class="flex justify-between items-center">
                            View details
                            <i class="fa-solid fa-arrow-right ml-2"></i>
                        </div>
                    </a>
                </div>

                <!-- Borrowed Books -->
                <div class="rounded bg-green-500 text-white shadow hover:shadow-lg transition">
                    <div class="flex px-5 py-4 items-center justify-between">
                        <div>
                            <div class="text-sm font-semibold">Borrowed Books</div>
                            <div class="text-2xl font-bold">{{ $total_borrowed ?? 0 }}</div>
                        </div>
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-white text-green-500">
                            <i class="fa-solid fa-book-open text-xl"></i>
                        </div>
                    </div>
                    <hr class="border-white border-opacity-20">
                    <a href="{{ route('admin.books') }}" class="block px-5 py-3 text-sm hover:bg-green-600 transition">
                        <div class="flex justify-between items-center">
                            View details
                            <i class="fa-solid fa-arrow-right ml-2"></i>
                        </div>
                    </a>
                </div>

                <!-- Overdue Books -->
                <div class="rounded bg-red-500 text-white shadow hover:shadow-lg transition">
                    <div class="flex px-5 py-4 items-center justify-between">
                        <div>
                            <div class="text-sm font-semibold">Overdue</div>
                            <div class="text-2xl font-bold">{{ $total_overdue ?? 0 }}</div>
                        </div>
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-white text-red-500">
                            <i class="fa-solid fa-clock text-xl"></i>
                        </div>
                    </div>
                    <hr class="border-white border-opacity-20">
                    <a href="#" class="block px-5 py-3 text-sm hover:bg-red-600 transition">
                        <div class="flex justify-between items-center">
                            View details
                            <i class="fa-solid fa-arrow-right ml-2"></i>
                        </div>
                    </a>
                </div>

                <!-- Students -->
                <div class="rounded bg-purple-500 text-white shadow hover:shadow-lg transition">
                    <div class="flex px-5 py-4 items-center justify-between">
                        <div>
                            <div class="text-sm font-semibold">Users</div>
                            <div class="text-2xl font-bold">{{ $total_users ?? 0 }}</div>
                        </div>
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-white text-purple-500">
                            <i class="fa-solid fa-user-graduate text-xl"></i>
                        </div>
                    </div>
                    <hr class="border-white border-opacity-20">
                    <a href="{{ route('admin.users') }}" class="block px-5 py-3 text-sm hover:bg-purple-600 transition">
                        <div class="flex justify-between items-center">
                            View details
                            <i class="fa-solid fa-arrow-right ml-2"></i>
                        </div>
                    </a>
                </div>

            </div>

            <div class="bg-[#1c2541] mt-3 p-3 rounded">
                <div class="flex justify-between mb-1">
                    <div>
                        <h2 class="font-bold">Reports</h2>
                    </div>
                    <div class="flex">
                        <span class="text-sm">View all</span>
                    </div>
                </div>
                <div class="bg-white px-4 py-3 text-[#1c2541] rounded shadow-sm border-l-[5px] border-l-blue-400">
                    <div class="flex justify-between gap-2">
                        <div class="font-normal text-gray-700 w-full">
                            <div class="text-base font-medium">Name</div>
                            <div class="flex space-x-3">
                                <div class="text-sm truncate w-full">
                                    Reserved the book "Safe Skies Archer".
                                </div>
                                <div class="flex items-center pt-1 text-xs font-normal whitespace-nowrap">2:00 pm</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Calendar -->
        <div class="md:col-span-2">
            <div class="bg-[#1c2541] text-white rounded-lg shadow-md p-3 w-full max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <button onclick="changeMonth(-1)" class="bg-[#3a506b] hover:bg-white hover:text-[#1c2541] px-3 py-1 rounded">
                        <i class="fa-solid fa-arrow-left text-xs"></i>
                    </button>
                    <h2 id="monthYear" class="text-lg font-bold tracking-wide">Month Year</h2>
                    <button onclick="changeMonth(1)" class="bg-[#3a506b] hover:bg-white hover:text-[#1c2541] px-3 py-1 rounded">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>

                <div class="grid grid-cols-7 text-center font-semibold text-sm mb-2">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>

                <div id="calendarDates" class="grid grid-cols-7 text-center text-sm gap-y-2"></div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection