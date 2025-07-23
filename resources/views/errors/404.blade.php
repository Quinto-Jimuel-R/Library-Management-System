@extends('errors::minimal')

@section('code')
    <h1 class="text-9xl mb-3 font-bold tracking-normal">404</h1>
    <h1 class="text-4xl mb-5 font-bold tracking-widest">Page not found</h1>
    <h1 class="text-1xl mb-5 font-bold tracking-wide">The page you were looking for doesn't exist</h1>

    <a href="{{ back()->getTargetUrl() }}" onclick="event.preventDefault(); window.history.length > 1 ? history.back() : window.location='{{ url('/') }}'" class="bg-[#3a506b] p-2 rounded-md">
        Go Back
    </a>
@endsection

@section('images')
    <img src="{{ asset('images/404.png') }}" alt="" class="h-150 object-cover">
@endsection