<x-app-layout>
    <div class="py-10 sm:py-14">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <div class="text-center mb-2">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-100">Twoje wyniki</h1>
                <p class="mt-2 text-gray-400 text-sm">{{ $calculation->created_at->format('d.m.Y H:i') }}</p>
            </div>

            <div class="bg-gray-800 border border-gray-700 shadow rounded-xl p-6">
                <div class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-gray-300">
                    <div><span class="font-medium text-gray-100">Cel:</span> {{ $calculation->goalLabel() }}</div>
                    <div><span class="font-medium text-gray-100">Aktywność:</span> {{ $calculation->activityLabel() }}</div>
                    <div><span class="font-medium text-gray-100">Płeć:</span> {{ $calculation->sexLabel() }}</div>
                    <div><span class="font-medium text-gray-100">Wiek:</span> {{ $calculation->age }}</div>
                    <div><span class="font-medium text-gray-100">Waga:</span> {{ rtrim(rtrim(number_format($calculation->weight_kg, 2, '.', ''), '0'), '.') }} kg</div>
                    <div><span class="font-medium text-gray-100">Wzrost:</span> {{ $calculation->height_cm }} cm</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-800 border border-gray-700 shadow rounded-xl p-6">
                    <div class="text-xs font-medium text-gray-400 uppercase tracking-wide">BMI</div>
                    <div class="mt-2 text-4xl font-bold text-gray-100">{{ number_format($calculation->bmi, 1) }}</div>
                    <div class="mt-1 text-sm text-indigo-400 font-medium">{{ $calculation->bmiCategory() }}</div>
                </div>

                <div class="bg-gray-800 border border-gray-700 shadow rounded-xl p-6">
                    <div class="text-xs font-medium text-gray-400 uppercase tracking-wide">BMR</div>
                    <div class="mt-2 text-4xl font-bold text-gray-100">{{ $calculation->bmr }}</div>
                    <div class="mt-1 text-xs text-gray-400">kcal / dzień · metabolizm spoczynkowy</div>
                </div>

                <div class="bg-gray-800 border border-gray-700 shadow rounded-xl p-6">
                    <div class="text-xs font-medium text-gray-400 uppercase tracking-wide">TDEE</div>
                    <div class="mt-2 text-4xl font-bold text-gray-100">{{ $calculation->tdee }}</div>
                    <div class="mt-1 text-xs text-gray-400">kcal / dzień · całkowite zapotrzebowanie</div>
                </div>
            </div>

            <div class="bg-indigo-600 text-white shadow-lg rounded-xl p-8">
                <div class="text-xs font-medium uppercase tracking-wide text-indigo-100">Cel kaloryczny</div>
                <div class="mt-2 text-5xl font-bold">{{ $calculation->target_calories }} <span class="text-2xl font-medium text-indigo-100">kcal / dzień</span></div>
                <div class="mt-2 text-indigo-100">Aby osiągnąć cel: {{ strtolower($calculation->goalLabel()) }}.</div>
            </div>

            <div class="bg-gray-800 border border-gray-700 shadow rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Rozkład makroskładników</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="rounded-lg border border-gray-700 bg-gray-900 p-5">
                        <div class="text-xs font-medium text-gray-400 uppercase">Białko</div>
                        <div class="mt-1 text-3xl font-bold text-gray-100">{{ $calculation->protein_g }} g</div>
                        <div class="mt-1 text-xs text-gray-500">{{ $calculation->protein_g * 4 }} kcal</div>
                    </div>
                    <div class="rounded-lg border border-gray-700 bg-gray-900 p-5">
                        <div class="text-xs font-medium text-gray-400 uppercase">Tłuszcze</div>
                        <div class="mt-1 text-3xl font-bold text-gray-100">{{ $calculation->fat_g }} g</div>
                        <div class="mt-1 text-xs text-gray-500">{{ $calculation->fat_g * 9 }} kcal</div>
                    </div>
                    <div class="rounded-lg border border-gray-700 bg-gray-900 p-5">
                        <div class="text-xs font-medium text-gray-400 uppercase">Węglowodany</div>
                        <div class="mt-1 text-3xl font-bold text-gray-100">{{ $calculation->carbs_g }} g</div>
                        <div class="mt-1 text-xs text-gray-500">{{ $calculation->carbs_g * 4 }} kcal</div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between pt-2">
                <a href="{{ route('calculator.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-gray-700 rounded-md font-semibold text-xs text-gray-200 uppercase tracking-widest hover:bg-gray-700">
                    Nowe obliczenie
                </a>
                <a href="{{ route('history.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-gray-700 rounded-md font-semibold text-xs text-gray-200 uppercase tracking-widest hover:bg-gray-700">
                    Zobacz historię
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
