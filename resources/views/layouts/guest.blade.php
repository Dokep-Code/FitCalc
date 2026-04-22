<!DOCTYPE html>
<html lang="pl" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Kalkulator fitness</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-900 text-gray-100">
        <div class="min-h-screen flex flex-col justify-center items-center px-6 py-12">
            <a href="/" class="flex items-center gap-3 text-indigo-400">
                <x-application-logo class="w-12 h-12" />
                <span class="text-xl font-semibold text-gray-100">Kalkulator fitness</span>
            </a>

            <div class="w-full sm:max-w-md mt-8 px-6 py-6 bg-gray-800 border border-gray-700 shadow-lg rounded-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
