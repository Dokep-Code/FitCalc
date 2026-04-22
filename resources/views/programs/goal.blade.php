<x-app-layout>
    <div class="py-10 sm:py-14">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('home') }}" class="text-sm text-gray-400 hover:text-gray-200">← Zmień cel</a>
            </div>

            <div class="mb-10">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-100">{{ $goalMeta['label'] }}</h1>
                <p class="mt-2 text-gray-400">{{ $goalMeta['tagline'] }} Wybierz plan treningowy i wariant diety.</p>
            </div>

            <section class="mb-12">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Plany treningowe</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($trainingPlans as $plan)
                        <a href="{{ route('programs.training', $plan) }}"
                           class="group block bg-gray-800 border border-gray-700 hover:border-indigo-500 rounded-xl p-6 transition">
                            <div class="flex items-start justify-between">
                                <div>
                                    <div class="text-lg font-semibold text-gray-100 group-hover:text-indigo-400">{{ $plan->name }}</div>
                                    <div class="mt-1 text-xs text-gray-400 uppercase tracking-wide">
                                        {{ $plan->difficulty }} · {{ $plan->duration_weeks }} tyg. · {{ $plan->exercises_count }} ćwiczeń
                                    </div>
                                </div>
                                <span class="text-indigo-400">→</span>
                            </div>
                            <p class="mt-3 text-sm text-gray-400">{{ $plan->description }}</p>
                        </a>
                    @endforeach
                </div>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Warianty diety</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($dietPlans as $plan)
                        <a href="{{ route('programs.diet', $plan) }}"
                           class="group block bg-gray-800 border border-gray-700 hover:border-indigo-500 rounded-xl p-6 transition">
                            <div class="flex items-start justify-between">
                                <div>
                                    <div class="text-lg font-semibold text-gray-100 group-hover:text-indigo-400">{{ $plan->name }}</div>
                                    <div class="mt-1 text-xs text-gray-400 uppercase tracking-wide">
                                        {{ $plan->calories_target }} kcal · {{ $plan->dishes_count }} dań
                                    </div>
                                </div>
                                <span class="text-indigo-400">→</span>
                            </div>
                            <p class="mt-3 text-sm text-gray-400">{{ $plan->description }}</p>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
