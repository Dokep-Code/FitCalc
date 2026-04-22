<x-app-layout>
    <div class="py-10 sm:py-14">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-100">Kalkulator fitness</h1>
                <p class="mt-3 text-gray-400 max-w-xl mx-auto">
                    Wprowadź swoje dane, aby obliczyć BMI, zapotrzebowanie kaloryczne i rozkład makroskładników dopasowany do Twojego celu.
                </p>
            </div>

            <div class="bg-gray-800 border border-gray-700 shadow-lg rounded-xl p-8">
                <form method="POST" action="{{ route('calculator.store') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="weight_kg" value="Waga (kg)" class="text-gray-300" />
                            <x-text-input id="weight_kg" name="weight_kg" type="number" step="0.1" min="20" max="400"
                                          class="mt-1 block w-full bg-gray-900 border-gray-700 text-gray-100"
                                          :value="old('weight_kg')" required autofocus />
                            <x-input-error :messages="$errors->get('weight_kg')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="height_cm" value="Wzrost (cm)" class="text-gray-300" />
                            <x-text-input id="height_cm" name="height_cm" type="number" min="100" max="250"
                                          class="mt-1 block w-full bg-gray-900 border-gray-700 text-gray-100"
                                          :value="old('height_cm')" required />
                            <x-input-error :messages="$errors->get('height_cm')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="age" value="Wiek (lata)" class="text-gray-300" />
                            <x-text-input id="age" name="age" type="number" min="10" max="120"
                                          class="mt-1 block w-full bg-gray-900 border-gray-700 text-gray-100"
                                          :value="old('age')" required />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="sex" value="Płeć" class="text-gray-300" />
                            <select id="sex" name="sex" required
                                    class="mt-1 block w-full bg-gray-900 border-gray-700 text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="male" @selected(old('sex') === 'male')>Mężczyzna</option>
                                <option value="female" @selected(old('sex') === 'female')>Kobieta</option>
                            </select>
                            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="activity_level" value="Poziom aktywności" class="text-gray-300" />
                            <select id="activity_level" name="activity_level" required
                                    class="mt-1 block w-full bg-gray-900 border-gray-700 text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="sedentary" @selected(old('activity_level') === 'sedentary')>Siedzący (brak ćwiczeń)</option>
                                <option value="light" @selected(old('activity_level') === 'light')>Lekka (1–3 dni/tydz.)</option>
                                <option value="moderate" @selected(old('activity_level', 'moderate') === 'moderate')>Umiarkowana (3–5 dni/tydz.)</option>
                                <option value="active" @selected(old('activity_level') === 'active')>Duża (6–7 dni/tydz.)</option>
                                <option value="very_active" @selected(old('activity_level') === 'very_active')>Bardzo duża (2x dziennie)</option>
                            </select>
                            <x-input-error :messages="$errors->get('activity_level')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="goal" value="Cel" class="text-gray-300" />
                            <select id="goal" name="goal" required
                                    class="mt-1 block w-full bg-gray-900 border-gray-700 text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="lose" @selected(old('goal') === 'lose')>Redukcja wagi</option>
                                <option value="maintain" @selected(old('goal', 'maintain') === 'maintain')>Utrzymanie wagi</option>
                                <option value="gain" @selected(old('goal') === 'gain')>Przyrost masy</option>
                            </select>
                            <x-input-error :messages="$errors->get('goal')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-6 border-t border-gray-700">
                        <x-primary-button>Oblicz</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
