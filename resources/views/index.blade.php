<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/f148de42f9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <link rel="icon" type="image" href="{{ asset('images/Logo.png') }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- #0b132b #1c2541 #3a506b -->
</head>

<!-- dark:bg-[#0a0a0a] DarkMode -->
<body class="flex flex-col min-h-screen bg-[#0b132b] justify-center items-center">
    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-900 lg:grow starting:opacity-0">
        <main class="w-full max-w-6xl p-2 sm:p-8">
            <div class="flex flex-col-2 rounded">
                <div class="bg-[#3a506b] hidden sm:flex w-full justify-center items-center rounded-lg sm:rounded-none sm:rounded-tl-md sm:rounded-bl-md">
                    <img src="{{ asset('images/Readers.png') }}" class="h-100 w-100 object-cover">
                </div>
                <div class="w-full flex justify-center items-center p-5 bg-[#FBF6EF] rounded-lg sm:rounded-none sm:rounded-tr-md sm:rounded-br-md">
                    <form action="{{ route('login') }}" id="loginForm" class="w-full max-w-sm " method="POST">
                        @csrf
                        <fieldset>
                            <legend class="text-center font-semibold mb-3">Login</legend>
                            @error('invalid')
                            <div class="text-red-500 text-sm mb-2 text-center">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="block w-full text-sm rounded-sm border border-gray-300 p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                            </div>
                            <div class="mb-2">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required class="block w-full rounded-sm text-sm border border-gray-300 p-2 pr-10 focus:ring focus:ring-blue-400 focus:ring-opacity-50 focus:border-blue-200 focus:outline-none">
                                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-4 flex items-center text-gray-600 focus:outline-none">
                                        <i id="eyeIcon" class="fa-solid fa-eye text-sm select-none"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3 flex items-center justify-between">
                                <div class="inline-flex items-center">
                                    <input type="checkbox" name="remember" id="remember" class="mr-1 border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-50"><label class="text-sm font-medium text-gray-700" for="remember">Remember Me</label>
                                </div>
                                <div>
                                    <a href="" class="text-sm text-blue-600 text-sm font-medium hover:text-blue-800 focus:outline-none focus:underline">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <button id="loginButton" type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-transparent rounded-sm shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 hover:cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <span id="buttonSpinner" class="hidden">
                                        <svg class="text-gray-300 animate-spin w-5 h-5" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z"
                                                stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path
                                                d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762"
                                                stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                                            </path>
                                        </svg>
                                    </span>
                                    <span id="buttonTextLogin">Login</span>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

<script src="{{ asset('js/login.js') }}"></script>
</html>