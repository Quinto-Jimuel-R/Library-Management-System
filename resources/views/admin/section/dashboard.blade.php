@extends('admin.main_layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-5 rounded-md mb-3 bg-[#1c2541]">
            <div class="w-full">
                <div class="rounded bg-blue-400 text-white px-5 py-4">
                    <div class="flex">
                        <div class="w-full flex items-center">
                            <i class="fa-solid fa-book text-[50px]"></i>
                        </div>
                        <div class="w-full flex justify-end">
                            <div class="flex flex-col">
                                <div class="text-center text-2xl font-bold">{{ $total_books }}</div>
                                <div class="text-center text-sm">Total Books</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="rounded bg-yellow-400 text-white px-5 py-4">
                    <div class="flex">
                        <div class="w-full flex items-center">
                            <i class="fa-solid fa-handshake-angle text-[50px]"></i>
                        </div>
                        <div class="w-full flex justify-end">
                            <div class="flex flex-col">
                                <div class="text-center text-2xl font-bold">258</div>
                                <div class="text-center text-sm">Borrowed Books</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="rounded bg-green-400 text-white px-5 py-4">
                    <div class="flex">
                        <div class="w-full flex items-center">
                            <i class="fa-solid fa-users text-[50px]"></i>
                        </div>
                        <div class="w-full flex justify-end">
                            <div class="flex flex-col">
                                <div class="text-center text-2xl font-bold">258</div>
                                <div class="text-center text-sm">Available Books</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="rounded bg-red-400 text-white px-5 py-4">
                    <div class="flex flex-row">
                        <div class="w-full flex items-center">
                            <i class="fa-solid fa-users text-[50px]"></i>
                        </div>
                        <div class="w-full flex justify-end">
                            <div class="flex flex-col">
                                <div class="text-center text-2xl font-bold">{{ $total_students }}</div>
                                <div class="text-center text-sm">Total Students</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-[#1c2541]">
            <div>
                dsadsa
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection