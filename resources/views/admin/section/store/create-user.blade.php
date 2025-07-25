@extends('admin.main_layout')

@section('head')

@endsection

@section('breadcrumbs')
<nav class="text-white text-sm" aria-label="Breadcrumb">
    <ol class="list-none p-0 inline-flex space-x-2">
        <li class="flex items-center">
            <a href="{{ route('admin.users') }}" class="text-white">User</a>
            <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M7.05 4.05a.75.75 0 011.06 0l5.25 5.25a.75.75 0 010 1.06l-5.25 5.25a.75.75 0 01-1.06-1.06L11.44 10 7.05 5.61a.75.75 0 010-1.06z" />
            </svg>
        </li>
        <li class="flex items-center">
            <a href="{{ route('user.create') }}" class="text-white">Create User</a>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="text-white bg-[#1c2541] p-5 rounded">

    <div class="flex justify-between mb-4">
        <div class="flex items-center">
            <h2 class="text-lg font-medium">User</h2>
        </div>
    </div>

    <div class="flex flex-col md:flex-row m-0 mb-2 md:mb-0">
        <div class="w-full">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                    <div>
                        <label for="email" class="block text-sm font-medium text-white">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}"
                            class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="member_type" class="block text-sm font-medium text-white">Member Type</label>
                        <select name="member_type" id="member_type"
                            class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                            <option value="" class="hidden" {{ old('member_type') === null ? 'selected' : '' }}>Select...</option>
                            <option value="admin" class="text-[#0b132b]" {{ old('member_type') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" class="text-[#0b132b]" {{ old('member_type') === 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        @error('member_type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                    <div>
                        <label for="name" class="block text-sm font-medium text-white">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-white">Password</label>
                        <input type="password" id="password" name="password" value="{{ old('password') }}" class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                        @foreach ($errors->get('password') as $error)
                            <span class="text-red-500 text-sm block">{{ $error }}</span>
                        @endforeach
                    </div>
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