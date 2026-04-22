<?php

namespace App\Services;

class FitnessCalculator
{
    private const ACTIVITY_MULTIPLIERS = [
        'sedentary' => 1.2,
        'light' => 1.375,
        'moderate' => 1.55,
        'active' => 1.725,
        'very_active' => 1.9,
    ];

    private const GOAL_ADJUSTMENT = [
        'lose' => -500,
        'maintain' => 0,
        'gain' => 500,
    ];

    public function calculate(array $input): array
    {
        $weight = (float) $input['weight_kg'];
        $height = (int) $input['height_cm'];
        $age = (int) $input['age'];
        $sex = $input['sex'];
        $activity = $input['activity_level'];
        $goal = $input['goal'];

        $heightM = $height / 100;
        $bmi = round($weight / ($heightM * $heightM), 2);

        $bmr = $sex === 'male'
            ? 10 * $weight + 6.25 * $height - 5 * $age + 5
            : 10 * $weight + 6.25 * $height - 5 * $age - 161;
        $bmr = (int) round($bmr);

        $tdee = (int) round($bmr * self::ACTIVITY_MULTIPLIERS[$activity]);
        $targetCalories = $tdee + self::GOAL_ADJUSTMENT[$goal];

        $proteinG = (int) round($weight * 2);
        $fatG = (int) round($weight * 1);
        $caloriesFromPF = $proteinG * 4 + $fatG * 9;
        $carbsG = (int) round(max(0, $targetCalories - $caloriesFromPF) / 4);

        return [
            'bmi' => $bmi,
            'bmr' => $bmr,
            'tdee' => $tdee,
            'target_calories' => $targetCalories,
            'protein_g' => $proteinG,
            'fat_g' => $fatG,
            'carbs_g' => $carbsG,
        ];
    }
}
