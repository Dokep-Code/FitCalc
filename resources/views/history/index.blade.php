<x-app-layout>
    <div class="py-10 sm:py-14">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-end justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-100">Historia obliczeń</h1>
                    <p class="mt-1 text-gray-400 text-sm">Twoje poprzednie wyniki, uporządkowane od najnowszych.</p>
                </div>
                <a href="{{ route('calculator.create') }}"
                   class="hidden sm:inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-indigo-500">
                    Nowe obliczenie
                </a>
            </div>

            @if (session('status'))
                <div class="mb-6 rounded-md bg-green-900/40 border border-green-700 p-4 text-sm text-green-200">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-gray-800 border border-gray-700 shadow rounded-xl overflow-hidden">
                @if ($calculations->isEmpty())
                    <div class="p-12 text-center">
                        <p class="text-gray-400 mb-4">Nie masz jeszcze żadnych obliczeń.</p>
                        <a href="{{ route('calculator.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-indigo-500">
                            Wykonaj pierwsze obliczenie
                        </a>
                    </div>
                @else
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-900/50">
                            <tr class="text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                <th class="px-6 py-3">Data</th>
                                <th class="px-6 py-3">Cel</th>
                                <th class="px-6 py-3">BMI</th>
                                <th class="px-6 py-3">Cel kcal</th>
                                <th class="px-6 py-3">Makro (B/T/W)</th>
                                <th class="px-6 py-3 text-right">Akcje</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach ($calculations as $calc)
                                <tr class="hover:bg-gray-900/40">
                                    <td class="px-6 py-4 text-sm text-gray-200">{{ $calc->created_at->format('d.m.Y H:i') }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $calc->goalLabel() }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ number_format($calc->bmi, 1) }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-100">{{ $calc->target_calories }} kcal</td>
                                    <td class="px-6 py-4 text-sm text-gray-300">{{ $calc->protein_g }} / {{ $calc->fat_g }} / {{ $calc->carbs_g }} g</td>
                                    <td class="px-6 py-4 text-right text-sm space-x-3 whitespace-nowrap">
                                        <a href="{{ route('calculator.results', $calc) }}"
                                           class="text-indigo-400 hover:text-indigo-300 font-medium">Szczegóły</a>
                                        <form method="POST" action="{{ route('history.destroy', $calc) }}" class="inline"
                                              onsubmit="return confirm('Czy na pewno usunąć to obliczenie?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Usuń</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="px-6 py-4 border-t border-gray-700 bg-gray-900/30">
                        {{ $calculations->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
