@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link rel="icon" type="image" href="{{ asset('images/Logo.png') }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- #0b132b #1c2541 #3a506b -->
</head>

<!-- dark:bg-[#0a0a0a] DarkMode -->
<body class="flex flex-col min-h-screen bg-[#0b132b] text-white justify-center items-center">
    <div class="px-10 flex flex-col-2 items-center justify-center">
        <div class="w-full text-center">
            <h1 class="text-9xl mb-3 font-bold tracking-normal">404</h1>
            <h1 class="text-4xl mb-5 font-bold tracking-widest">Page not found</h1>

            <a href="{{ back()->getTargetUrl() }}" onclick="event.preventDefault(); window.history.length > 1 ? history.back() : window.location='{{ url('/') }}'" class="bg-[#3a506b] p-2 rounded-md">
                Go Back
            </a>
        </div>
        
        <div class="hidden sm:flex w-full">
            <img src="{{ asset('images/404.png') }}" alt="" class="h-150 object-cover">
        </div>
    </div>
</body>

</html>