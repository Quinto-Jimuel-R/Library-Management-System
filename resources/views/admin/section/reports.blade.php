@extends('admin.main_layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
    <div class="text-white">

        <h2 class="text-xl font-bold mb-4">Report Section</h2>
        <p class=""> This is the main content area. Add your components or dynamic content here. </p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:cursor-pointer hover:bg-red-600">Logout</button>
        </form>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection