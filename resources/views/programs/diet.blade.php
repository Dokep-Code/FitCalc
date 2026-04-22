<x-app-layout>
    @php
        $mealOrder = ['breakfast', 'snack', 'lunch', 'dinner'];
        $mealLabels = ['breakfast' => 'Śniadanie', 'snack' => 'Przekąska', 'lunch' => 'Obiad', 'dinner' => 'Kolacja'];
        $allDishes = $meals->flatten();
        $totals = [
            'kcal' => $allDishes->sum('calories'),
            'p' => $allDishes->sum('protein_g'),
            'f' => $allDishes->sum('fat_g'),
            'c' => $allDishes->sum('carbs_g'),
        ];
    @endphp

    <div class="py-10 sm:py-14">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('programs.goal', $plan->goal) }}" class="text-sm text-gray-400 hover:text-gray-200">
                    ← {{ $goalMeta['label'] }}
                </a>
            </div>

            <div class="mb-8">
                <div class="text-xs font-medium text-indigo-400 uppercase tracking-wide">Wariant diety</div>
                <h1 class="mt-1 text-3xl sm:text-4xl font-bold text-gray-100">{{ $plan->name }}</h1>
                <div class="mt-2 text-sm text-gray-400">Cel: {{ $plan->calories_target }} kcal / dzień</div>
                <p class="mt-4 text-gray-300">{{ $plan->description }}</p>
            </div>

            <div class="bg-indigo-600 text-white rounded-xl p-6 mb-8">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
                    <div>
                        <div class="text-xs text-indigo-100 uppercase">Suma kcal</div>
                        <div class="text-2xl font-bold">{{ $totals['kcal'] }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-indigo-100 uppercase">Białko</div>
                        <div class="text-2xl font-bold">{{ $totals['p'] }} g</div>
                    </div>
                    <div>
                        <div class="text-xs text-indigo-100 uppercase">Tłuszcze</div>
                        <div class="text-2xl font-bold">{{ $totals['f'] }} g</div>
                    </div>
                    <div>
                        <div class="text-xs text-indigo-100 uppercase">Węglow.</div>
                        <div class="text-2xl font-bold">{{ $totals['c'] }} g</div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                @foreach ($mealOrder as $mealKey)
                    @if ($meals->has($mealKey))
                        @foreach ($meals[$mealKey] as $dish)
                            <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-start justify-between gap-4 flex-wrap">
                                    <div class="min-w-0">
                                        <div class="text-xs font-medium text-indigo-400 uppercase tracking-wide">{{ $mealLabels[$mealKey] }}</div>
                                        <div class="mt-1 text-lg font-semibold text-gray-100">{{ $dish->name }}</div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-gray-100">{{ $dish->calories }} <span class="text-sm text-gray-400 font-medium">kcal</span></div>
                                        <div class="text-xs text-gray-400 mt-1">B {{ $dish->protein_g }} · T {{ $dish->fat_g }} · W {{ $dish->carbs_g }} g</div>
                                    </div>
                                </div>
                                <p class="mt-3 text-gray-300">{{ $dish->description }}</p>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
