<x-app-layout>
    <div class="py-10 sm:py-14">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('programs.goal', $plan->goal) }}" class="text-sm text-gray-400 hover:text-gray-200">
                    ← {{ $goalMeta['label'] }}
                </a>
            </div>

            <div class="mb-8">
                <div class="text-xs font-medium text-indigo-400 uppercase tracking-wide">Plan treningowy</div>
                <h1 class="mt-1 text-3xl sm:text-4xl font-bold text-gray-100">{{ $plan->name }}</h1>
                <div class="mt-2 text-sm text-gray-400">
                    {{ $plan->difficulty }} · {{ $plan->duration_weeks }} tygodni
                </div>
                <p class="mt-4 text-gray-300">{{ $plan->description }}</p>
            </div>

            <div class="space-y-6">
                @foreach ($days as $day => $exercises)
                    <div class="bg-gray-800 border border-gray-700 rounded-xl overflow-hidden">
                        <div class="px-6 py-4 bg-gray-900/50 border-b border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-100">{{ $day }}</h2>
                        </div>
                        <ul class="divide-y divide-gray-700">
                            @foreach ($exercises as $ex)
                                <li class="px-6 py-4 flex flex-wrap justify-between gap-x-6 gap-y-2">
                                    <div class="min-w-0">
                                        <div class="font-medium text-gray-100">{{ $ex->name }}</div>
                                        @if ($ex->notes)
                                            <div class="mt-1 text-xs text-gray-400">{{ $ex->notes }}</div>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-300 flex items-center gap-5 whitespace-nowrap">
                                        <span><span class="text-gray-500">Serie:</span> {{ $ex->sets }}</span>
                                        <span><span class="text-gray-500">Powt.:</span> {{ $ex->reps }}</span>
                                        @if ($ex->rest_seconds > 0)
                                            <span><span class="text-gray-500">Przerwa:</span> {{ $ex->rest_seconds }}s</span>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
