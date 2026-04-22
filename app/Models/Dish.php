<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dish extends Model
{
    protected $fillable = ['diet_plan_id', 'meal', 'name', 'description', 'calories', 'protein_g', 'fat_g', 'carbs_g', 'position'];

    public function dietPlan(): BelongsTo
    {
        return $this->belongsTo(DietPlan::class);
    }

    public function mealLabel(): string
    {
        return match ($this->meal) {
            'breakfast' => 'Śniadanie',
            'snack' => 'Przekąska',
            'lunch' => 'Obiad',
            'dinner' => 'Kolacja',
            default => ucfirst($this->meal),
        };
    }
}
