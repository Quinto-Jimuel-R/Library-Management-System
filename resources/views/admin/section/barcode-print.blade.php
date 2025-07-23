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

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @media print {
            @page {
                size: 8.5in 2.75in; /* 1/4 of letter vertically */
                margin: 0;
            }

            body {
                margin: 0;
                padding: 0;
            }

            html, body {
                width: 8.5in;
                height: 2.75in;
            }
        }
    </style>
</head>

<body onload="window.print()" onafterprint="window.location.href='{{ route('book.create') }}'">
    <div class="w-full h-full p-2">
        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($book_code, 'C128', 2, 70) }}" alt="barcode" />
        <p class="mx-9 text-gray-900 tracking-widest">{{ $book_code }}</p>
    </div>
</body>

</html>
