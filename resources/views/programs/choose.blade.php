<!DOCTYPE html>
<html lang="pl" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kalkulator fitness – wybierz cel</title>
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
                            <a href="{{ route('calculator.create') }}" class="text-gray-300 hover:text-white px-3 py-2">
                                Kalkulator
                            </a>
                            <a href="{{ route('history.index') }}" class="text-gray-300 hover:text-white px-3 py-2">
                                Historia
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button class="text-gray-300 hover:text-white px-3 py-2">Wyloguj</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2">Zaloguj się</a>
                            <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-indigo-600 text-white font-medium hover:bg-indigo-500">
                                Zarejestruj się
                            </a>
                        @endauth
                    </nav>
                </div>
            </header>

            <main class="flex-1 flex items-center">
                <div class="max-w-4xl w-full mx-auto px-6 py-16">
                    <div class="text-center mb-12">
                        <h1 class="text-4xl sm:text-5xl font-bold text-gray-100">Co chcesz osiągnąć?</h1>
                        <p class="mt-4 text-lg text-gray-400 max-w-xl mx-auto">
                            Wybierz swój cel, a my pokażemy Ci przykładowe plany treningowe i różne warianty diety z konkretnymi daniami.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($goals as $key => $meta)
                            <a href="{{ route('programs.goal', $key) }}"
                               class="group block bg-gray-800 border border-gray-700 hover:border-indigo-500 rounded-2xl p-8 transition">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-xl bg-indigo-600/20 text-indigo-400 flex items-center justify-center">
                                        @if ($key === 'lose')
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                            </svg>
                                        @else
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-2xl font-bold text-gray-100 group-hover:text-indigo-400">{{ $meta['label'] }}</div>
                                        <div class="text-gray-400 mt-1">{{ $meta['tagline'] }}</div>
                                    </div>
                                </div>
                                <div class="mt-6 text-sm text-indigo-400 font-medium group-hover:translate-x-1 transition">
                                    Zobacz plany →
                                </div>
                            </a>
                        @endforeach
                    </div>

                    @auth
                        <div class="mt-10 text-center text-sm text-gray-500">
                            Chcesz sprawdzić swoje zapotrzebowanie kaloryczne?
                            <a href="{{ route('calculator.create') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">Otwórz kalkulator</a>.
                        </div>
                    @endauth
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
