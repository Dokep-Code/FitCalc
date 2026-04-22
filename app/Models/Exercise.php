<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercise extends Model
{
    protected $fillable = ['training_plan_id', 'day', 'name', 'sets', 'reps', 'rest_seconds', 'notes', 'position'];

    public function trainingPlan(): BelongsTo
    {
        return $this->belongsTo(TrainingPlan::class);
    }
}
