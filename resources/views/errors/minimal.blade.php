<!DOCTYPE html>
<html lang="en">
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
    <body class="flex flex-col min-h-screen bg-[#0b132b] text-white justify-center items-center">
        <div class="px-10 flex flex-col-2 items-center justify-center">
            <div class="w-full text-center">
                @yield('code')
            </div>
            
            <div class="hidden sm:flex w-full">
                @yield('images')
            </div>
        </div>
    </body>
</html>
