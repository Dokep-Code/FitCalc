<?php

namespace Database\Seeders;

use App\Models\DietPlan;
use App\Models\Dish;
use App\Models\Exercise;
use App\Models\TrainingPlan;
use Illuminate\Database\Seeder;

class ProgramsSeeder extends Seeder
{
    public function run(): void
    {
        TrainingPlan::query()->delete();
        DietPlan::query()->delete();

        $this->seedTrainingPlans();
        $this->seedDietPlans();
    }

    private function seedTrainingPlans(): void
    {
        $loseCardio = TrainingPlan::create([
            'goal' => 'lose',
            'name' => 'Spalanie tłuszczu – cardio + obwód',
            'difficulty' => 'Początkujący',
            'duration_weeks' => 8,
            'description' => 'Trzy treningi w tygodniu łączące ćwiczenia obwodowe z interwałami cardio. Nastawiony na deficyt kaloryczny i zachowanie masy mięśniowej.',
        ]);
        $this->exercises($loseCardio->id, [
            ['Poniedziałek – Obwód A', [
                ['Przysiady z masą ciała', 3, '15', 45, 'Tempo kontrolowane, pięty wklejone w podłoże'],
                ['Pompki (kolana dla początkujących)', 3, '10-12', 45, null],
                ['Wiosłowanie hantlą w opadzie', 3, '12', 45, 'Prosty kręgosłup'],
                ['Deska (plank)', 3, '30 sek.', 45, null],
                ['Cardio – bieg na bieżni', 1, '15 min.', 0, 'Tempo rozmowne'],
            ]],
            ['Środa – Interwały', [
                ['Rozgrzewka – marsz/trucht', 1, '8 min.', 0, null],
                ['Sprint / marsz naprzemiennie', 8, '30/60 sek.', 60, 'HIIT – intensywność 8/10'],
                ['Pajacyki', 3, '40', 30, null],
                ['Brzuszki rowerkowe', 3, '20', 30, null],
            ]],
            ['Piątek – Obwód B', [
                ['Wykroki chodzone', 3, '12/nogę', 45, null],
                ['Hip thrust na ławce', 3, '12', 45, null],
                ['Pompki na barki (pike)', 3, '8-10', 45, null],
                ['Martwy ciąg z hantlami', 3, '12', 60, 'Lekki ciężar, technika'],
                ['Cardio – rower', 1, '20 min.', 0, 'Strefa tętna 60-70%'],
            ]],
        ]);

        $loseWalk = TrainingPlan::create([
            'goal' => 'lose',
            'name' => 'Aktywny deficyt – 10k kroków + siła 2x',
            'difficulty' => 'Bardzo początkujący',
            'duration_weeks' => 12,
            'description' => 'Podstawa to 10 000 kroków dziennie. Do tego dwa łagodne treningi siłowe w tygodniu. Niski próg wejścia, duża skuteczność długoterminowa.',
        ]);
        $this->exercises($loseWalk->id, [
            ['Wtorek – Całe ciało', [
                ['Przysiady z krzesłem', 3, '12', 60, 'Siadaj na krzesło i wstawaj'],
                ['Pompki o ścianę', 3, '12', 60, null],
                ['Mostek biodrowy', 3, '15', 45, null],
                ['Wiosłowanie gumą', 3, '15', 45, null],
                ['Martwy robak (dead bug)', 3, '10/stronę', 30, null],
            ]],
            ['Czwartek – Całe ciało', [
                ['Przysiady goblet', 3, '12', 60, 'Hantla/butelka wody przy klatce'],
                ['Pompki z kolan', 3, '8-10', 60, null],
                ['Wykroki w miejscu', 3, '10/nogę', 45, null],
                ['Superman (unoszenie pleców)', 3, '12', 30, null],
                ['Plank boczny', 3, '20 sek./stronę', 30, null],
            ]],
            ['Codziennie', [
                ['Spacer', 1, '10 000 kroków', 0, 'Rozbij na 2-3 sesje'],
            ]],
        ]);

        $gainPPL = TrainingPlan::create([
            'goal' => 'gain',
            'name' => 'Push / Pull / Legs – 3 dni',
            'difficulty' => 'Średniozaawansowany',
            'duration_weeks' => 10,
            'description' => 'Klasyczny split PPL w wersji 3-dniowej. Skupienie na ćwiczeniach wielostawowych z progresywnym obciążeniem.',
        ]);
        $this->exercises($gainPPL->id, [
            ['Poniedziałek – Push', [
                ['Wyciskanie sztangi na ławce poziomej', 4, '6-8', 120, 'Główne ćwiczenie siłowe'],
                ['Wyciskanie hantli na skosie dodatnim', 3, '8-10', 90, null],
                ['Wyciskanie żołnierskie stojąc', 3, '8-10', 90, null],
                ['Rozpiętki na wyciągu (butterfly)', 3, '12', 60, null],
                ['Francuskie wyciskanie EZ', 3, '10-12', 60, null],
                ['Prostowanie ramion na wyciągu', 3, '12-15', 45, null],
            ]],
            ['Środa – Pull', [
                ['Martwy ciąg klasyczny', 4, '5', 150, 'Ciężar podstawowy, technika priorytetem'],
                ['Podciąganie na drążku', 4, '6-10', 120, 'Z gumą jeśli trzeba'],
                ['Wiosłowanie sztangą w opadzie', 3, '8', 90, null],
                ['Ściąganie drążka do klatki', 3, '10-12', 60, null],
                ['Uginanie ramion ze sztangą', 3, '10', 60, null],
                ['Uginanie hantli młotkowe', 3, '12', 45, null],
            ]],
            ['Piątek – Legs', [
                ['Przysiad ze sztangą z tyłu', 4, '6-8', 150, 'Głębokość do równoległości'],
                ['Rumuński martwy ciąg', 3, '8', 120, 'Czujesz dwugłowe'],
                ['Wykroki chodzone z hantlami', 3, '10/nogę', 90, null],
                ['Wyprosty nóg na maszynie', 3, '12', 60, null],
                ['Uginanie nóg leżąc', 3, '12', 60, null],
                ['Wspięcia na palce stojąc', 4, '15', 45, null],
            ]],
        ]);

        $gainFBW = TrainingPlan::create([
            'goal' => 'gain',
            'name' => 'Full Body Workout – 3 dni',
            'difficulty' => 'Początkujący',
            'duration_weeks' => 8,
            'description' => 'Idealny start z treningiem siłowym. Trzy razy w tygodniu całe ciało, ćwiczenia bazowe, szybki progres siły.',
        ]);
        $this->exercises($gainFBW->id, [
            ['Poniedziałek', [
                ['Przysiad ze sztangą', 3, '5', 150, 'Dodawaj 2.5 kg co trening'],
                ['Wyciskanie sztangi na ławce', 3, '5', 150, null],
                ['Wiosłowanie sztangą', 3, '8', 90, null],
                ['Deska', 3, '45 sek.', 60, null],
            ]],
            ['Środa', [
                ['Przysiad ze sztangą', 3, '5', 150, null],
                ['Wyciskanie żołnierskie', 3, '5', 150, null],
                ['Martwy ciąg', 1, '5', 180, 'Jedna ciężka seria robocza'],
                ['Uginanie ramion', 3, '10', 60, null],
            ]],
            ['Piątek', [
                ['Przysiad ze sztangą', 3, '5', 150, null],
                ['Wyciskanie sztangi na ławce', 3, '5', 150, null],
                ['Podciąganie na drążku', 3, 'max', 120, null],
                ['Prostowanie ramion', 3, '10', 60, null],
                ['Wspięcia na palce', 3, '15', 45, null],
            ]],
        ]);
    }

    private function exercises(int $planId, array $days): void
    {
        $position = 0;
        foreach ($days as [$day, $items]) {
            foreach ($items as [$name, $sets, $reps, $rest, $notes]) {
                Exercise::create([
                    'training_plan_id' => $planId,
                    'day' => $day,
                    'name' => $name,
                    'sets' => $sets,
                    'reps' => $reps,
                    'rest_seconds' => $rest,
                    'notes' => $notes,
                    'position' => $position++,
                ]);
            }
        }
    }

    private function seedDietPlans(): void
    {
        $loseBalanced = DietPlan::create([
            'goal' => 'lose',
            'name' => 'Zrównoważona redukcja – 1800 kcal',
            'calories_target' => 1800,
            'description' => 'Klasyczny deficyt z naciskiem na białko (syci) i warzywa (objętość). Dla osób 60-80 kg.',
        ]);
        $this->dishes($loseBalanced->id, [
            ['breakfast', 'Owsianka z jagodami i orzechami', '50 g płatków owsianych na mleku 1.5%, garść jagód, łyżka orzechów włoskich, odżywka białkowa.', 420, 28, 12, 55],
            ['lunch', 'Kurczak z ryżem i brokułem', '150 g piersi z kurczaka, 60 g ryżu basmati (sucha masa), pół talerza gotowanego brokułu, łyżeczka oliwy.', 520, 48, 10, 60],
            ['snack', 'Twaróg z rzodkiewką', '200 g twarogu chudego, pół pęczka rzodkiewki, kromka chleba żytniego.', 280, 36, 4, 24],
            ['dinner', 'Sałatka z łososiem', '120 g łososia pieczonego, mix sałat, pomidor, ogórek, pół awokado, oliwa i cytryna.', 480, 30, 30, 16],
        ]);

        $loseVege = DietPlan::create([
            'goal' => 'lose',
            'name' => 'Wegetariańska redukcja – 1700 kcal',
            'calories_target' => 1700,
            'description' => 'Oparta o rośliny strączkowe, jajka i nabiał. Dużo błonnika, niski indeks glikemiczny.',
        ]);
        $this->dishes($loseVege->id, [
            ['breakfast', 'Jajecznica na maśle z warzywami', '3 jajka, pół papryki, garść szpinaku, 10 g masła, kromka pełnoziarnistego pieczywa.', 400, 24, 24, 20],
            ['lunch', 'Curry z ciecierzycy', '150 g ugotowanej ciecierzycy, pół puszki pomidorów, cebula, mleczko kokosowe 50 ml, 50 g ryżu (sucha masa).', 540, 20, 16, 78],
            ['snack', 'Jogurt grecki z owocami', '200 g jogurtu greckiego 2%, jabłko, łyżeczka miodu, łyżka migdałów.', 280, 18, 12, 28],
            ['dinner', 'Tofu smażone z warzywami', '150 g tofu, brokuł, papryka, sos sojowy, łyżka oleju sezamowego, 40 g makaronu ryżowego.', 480, 28, 18, 50],
        ]);

        $gainPower = DietPlan::create([
            'goal' => 'gain',
            'name' => 'Nadwyżka siłownika – 3200 kcal',
            'calories_target' => 3200,
            'description' => 'Bogata w węglowodany i białko. Dla osób aktywnie trenujących siłowo z masą 75-90 kg.',
        ]);
        $this->dishes($gainPower->id, [
            ['breakfast', 'Omlet z 5 jaj + ryż + owoce', '5 jaj całych, 80 g ryżu (sucha), banan, łyżeczka masła orzechowego.', 820, 45, 35, 80],
            ['lunch', 'Wołowina z makaronem', '200 g wołowiny (rostbef), 120 g makaronu (sucha), sos pomidorowy z warzywami, łyżka oliwy.', 900, 60, 25, 110],
            ['snack', 'Shake potreningowy', '30 g WPC, 500 ml mleka 2%, banan, 50 g płatków owsianych, łyżka masła orzechowego.', 680, 42, 20, 85],
            ['dinner', 'Łosoś z batatami i szparagami', '180 g łososia, 250 g batatów, pęczek szparagów, łyżka oliwy.', 780, 45, 32, 70],
        ]);

        $gainLean = DietPlan::create([
            'goal' => 'gain',
            'name' => 'Lean bulk – 2800 kcal',
            'calories_target' => 2800,
            'description' => 'Umiarkowana nadwyżka z priorytetem jakości. Mniej śmieci, więcej białka i zdrowych tłuszczów.',
        ]);
        $this->dishes($gainLean->id, [
            ['breakfast', 'Owsianka mocna', '80 g płatków owsianych na mleku, 30 g WPC, banan, 20 g orzechów nerkowca.', 680, 40, 22, 80],
            ['lunch', 'Indyk z kaszą gryczaną', '200 g piersi z indyka, 80 g kaszy gryczanej (sucha), surówka z kapusty pekińskiej, łyżka oliwy.', 720, 60, 15, 75],
            ['snack', 'Kanapki z tuńczykiem', '2 kromki pełnoziarniste, puszka tuńczyka w sosie własnym, jajko, pół awokado, pomidor.', 520, 42, 22, 38],
            ['dinner', 'Pierś z kurczaka z ziemniakami', '180 g piersi, 300 g ziemniaków pieczonych, mix sałat z oliwą i serem feta 30 g.', 740, 55, 22, 70],
        ]);
    }

    private function dishes(int $planId, array $items): void
    {
        foreach ($items as $i => [$meal, $name, $desc, $kcal, $p, $f, $c]) {
            Dish::create([
                'diet_plan_id' => $planId,
                'meal' => $meal,
                'name' => $name,
                'description' => $desc,
                'calories' => $kcal,
                'protein_g' => $p,
                'fat_g' => $f,
                'carbs_g' => $c,
                'position' => $i,
            ]);
        }
    }
}
