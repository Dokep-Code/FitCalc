<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class DietPlan extends Model
{
    protected $fillable = ['goal', 'name', 'calories_target', 'description'];

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class)->orderBy('position');
    }

    public function dishesByMeal(): Collection
    {
        return $this->dishes->groupBy('meal');
    }
}
