<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name' )}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- #DCE0D9 #FBF6EF #EAD7C3 -->
    </head>

    <!-- dark:bg-[#0a0a0a] DarkMode --> 
    <body class="flex flex-col min-h-screen bg-[#EAD7C3] justify-center items-center">
        <h1 class="text-3xl font-bold">User Dashboard</h1>
         <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:cursor-pointer hover:bg-red-600">Logout</button>
        </form>

    </body>
</html>