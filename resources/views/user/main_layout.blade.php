<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="icon" type="image" href="{{ asset('images/Logo.png') }}">

    @yield('head')

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- #0b132b #1c2541 #3a506b -->
</head>

<!-- dark:bg-[#0a0a0a] DarkMode -->

<body class="bg-[#0b132b]">
    <!-- Full Page Layout -->

    <div class="flex h-full">

        <!-- Sidebar -->
        <div id="sidebar" class="fixed top-0 left-0 h-full w-64 md:w-20 lg:w-64 bg-[#1c2541] transform -translate-x-full md:translate-x-0 transition-all duration-300 ease-in-out z-90 flex flex-col overflow-y-auto">
            @include('user._partial._sidebar')
        </div>

        <!-- Overlay -->
        <div id="overlay" class="fixed inset-0 bg-gray-200 opacity-20 z-50 hidden md:hidden"></div>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col md:ml-20 lg:ml-64 transition-all duration-300 ease-in-out">

            <!-- Topbar -->
            <header class="sticky top-0 z-40 bg-[#1c2541] shadow p-5 md:p-6 flex flex-col-2 items-center justify-between transition-all duration-300 ease-in-out">
                @include('user._partial._topbar')
                <div class="hidden md:block lg:block">
                    @yield('breadcrumbs')
                </div>
            </header>

            <!-- Page Content -->
            <main class="bg-[#0b132b] min-h-full p-6 overflow-y-auto flex-1 transition-all duration-300 ease-in-out">
                @yield('content')
            </main>
            
        </div>

    </div>

    @yield('scripts')

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>