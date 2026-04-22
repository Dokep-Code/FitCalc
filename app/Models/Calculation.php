<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calculation extends Model
{
    protected $fillable = [
        'user_id',
        'weight_kg', 'height_cm', 'age', 'sex', 'activity_level', 'goal',
        'bmi', 'bmr', 'tdee', 'target_calories', 'protein_g', 'fat_g', 'carbs_g',
    ];

    protected $casts = [
        'weight_kg' => 'float',
        'bmi' => 'float',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bmiCategory(): string
    {
        return match (true) {
            $this->bmi < 18.5 => 'Niedowaga',
            $this->bmi < 25 => 'Waga prawidłowa',
            $this->bmi < 30 => 'Nadwaga',
            default => 'Otyłość',
        };
    }

    public function goalLabel(): string
    {
        return match ($this->goal) {
            'lose' => 'Redukcja',
            'maintain' => 'Utrzymanie',
            'gain' => 'Przyrost',
        };
    }

    public function activityLabel(): string
    {
        return match ($this->activity_level) {
            'sedentary' => 'Siedzący',
            'light' => 'Lekka aktywność',
            'moderate' => 'Umiarkowana aktywność',
            'active' => 'Duża aktywność',
            'very_active' => 'Bardzo duża aktywność',
        };
    }

    public function sexLabel(): string
    {
        return $this->sex === 'male' ? 'Mężczyzna' : 'Kobieta';
    }
}
