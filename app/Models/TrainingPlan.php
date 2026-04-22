<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class TrainingPlan extends Model
{
    protected $fillable = ['goal', 'name', 'difficulty', 'duration_weeks', 'description'];

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class)->orderBy('position');
    }

    public function exercisesByDay(): Collection
    {
        return $this->exercises->groupBy('day');
    }
}
