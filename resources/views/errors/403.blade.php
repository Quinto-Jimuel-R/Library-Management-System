@extends('errors::minimal')

@section('code')
    <h1 class="text-9xl mb-3 font-bold tracking-normal">403</h1>
    <h1 class="text-4xl mb-5 font-bold tracking-wide">Access Denied</h1>
    <h1 class="text-1xl mb-5 font-bold tracking-wide">You do not have a permission to access this page</h1>

    <a href="{{ back()->getTargetUrl() }}" onclick="event.preventDefault(); window.history.length > 1 ? history.back() : window.location='{{ url('/') }}'" class="bg-[#3a506b] p-2 rounded-md">
        Go Back
    </a>
@endsection

@section('images')
    <img src="{{ asset('images/403.png') }}" alt="" class="h-150 object-cover">
@endsection