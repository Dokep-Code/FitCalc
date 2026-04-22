<!DOCTYPE html>
<html lang="pl" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kalkulator fitness</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-900 text-gray-100">
        <div class="min-h-screen flex flex-col">
            <header class="border-b border-gray-800">
                <div class="max-w-6xl mx-auto px-6 py-5 flex justify-between items-center">
                    <a href="/" class="flex items-center gap-2 text-indigo-400">
                        <x-application-logo class="w-8 h-8" />
                        <span class="text-lg font-semibold text-gray-100">Kalkulator fitness</span>
                    </a>
                    <nav class="flex items-center gap-3 text-sm">
                        @auth
                            <a href="{{ route('calculator.create') }}"
                               class="px-4 py-2 rounded-md bg-indigo-600 text-white font-medium hover:bg-indigo-500">
                                Przejdź do kalkulatora
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white font-medium px-3 py-2">
                                Zaloguj się
                            </a>
                            <a href="{{ route('register') }}"
                               class="px-4 py-2 rounded-md bg-indigo-600 text-white font-medium hover:bg-indigo-500">
                                Zarejestruj się
                            </a>
                        @endauth
                    </nav>
                </div>
            </header>

            <main class="flex-1 flex items-center">
                <div class="max-w-6xl w-full mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                    <div>
                        <h1 class="text-4xl sm:text-5xl font-bold text-gray-100 leading-tight">
                            Policz swoje <span class="text-indigo-400">zapotrzebowanie kaloryczne</span> i makro w kilka sekund.
                        </h1>
                        <p class="mt-6 text-lg text-gray-400">
                            Wprowadź wagę, wzrost, wiek i cel &mdash; otrzymasz BMI, BMR, TDEE oraz rozkład białka, tłuszczów i węglowodanów. Wszystko zapisuje się w historii Twojego konta.
                        </p>
                        <div class="mt-8 flex flex-wrap gap-3">
                            @auth
                                <a href="{{ route('calculator.create') }}"
                                   class="inline-flex items-center px-6 py-3 rounded-md bg-indigo-600 text-white font-semibold hover:bg-indigo-500">
                                    Otwórz kalkulator
                                </a>
                                <a href="{{ route('history.index') }}"
                                   class="inline-flex items-center px-6 py-3 rounded-md bg-gray-800 border border-gray-700 text-gray-200 font-semibold hover:bg-gray-700">
                                    Moja historia
                                </a>
                            @else
                                <a href="{{ route('register') }}"
                                   class="inline-flex items-center px-6 py-3 rounded-md bg-indigo-600 text-white font-semibold hover:bg-indigo-500">
                                    Zacznij teraz
                                </a>
                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center px-6 py-3 rounded-md bg-gray-800 border border-gray-700 text-gray-200 font-semibold hover:bg-gray-700">
                                    Mam już konto
                                </a>
                            @endauth
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                            <div class="text-sm font-semibold text-indigo-400">BMI</div>
                            <div class="mt-1 text-gray-300">Wskaźnik masy ciała wraz z oceną kategorii wagowej.</div>
                        </div>
                        <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                            <div class="text-sm font-semibold text-indigo-400">BMR &amp; TDEE</div>
                            <div class="mt-1 text-gray-300">Podstawowa przemiana materii i całkowite dzienne zapotrzebowanie energetyczne (Mifflin-St Jeor).</div>
                        </div>
                        <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                            <div class="text-sm font-semibold text-indigo-400">Makroskładniki</div>
                            <div class="mt-1 text-gray-300">Białko, tłuszcze i węglowodany dobrane do celu: redukcja, utrzymanie lub przyrost masy.</div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="border-t border-gray-800">
                <div class="max-w-6xl mx-auto px-6 py-6 text-sm text-gray-500">
                    Kalkulator fitness &middot; projekt uczelniany
                </div>
            </footer>
        </div>
    </body>
</html>
