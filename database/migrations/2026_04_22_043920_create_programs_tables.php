<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_plans', function (Blueprint $table) {
            $table->id();
            $table->string('goal');
            $table->string('name');
            $table->string('difficulty');
            $table->unsignedTinyInteger('duration_weeks');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_plan_id')->constrained()->cascadeOnDelete();
            $table->string('day');
            $table->string('name');
            $table->unsignedTinyInteger('sets');
            $table->string('reps');
            $table->unsignedSmallInteger('rest_seconds');
            $table->string('notes')->nullable();
            $table->unsignedSmallInteger('position')->default(0);
            $table->timestamps();
        });

        Schema::create('diet_plans', function (Blueprint $table) {
            $table->id();
            $table->string('goal');
            $table->string('name');
            $table->unsignedSmallInteger('calories_target');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diet_plan_id')->constrained()->cascadeOnDelete();
            $table->string('meal');
            $table->string('name');
            $table->text('description');
            $table->unsignedSmallInteger('calories');
            $table->unsignedSmallInteger('protein_g');
            $table->unsignedSmallInteger('fat_g');
            $table->unsignedSmallInteger('carbs_g');
            $table->unsignedSmallInteger('position')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('diet_plans');
        Schema::dropIfExists('exercises');
        Schema::dropIfExists('training_plans');
    }
};
