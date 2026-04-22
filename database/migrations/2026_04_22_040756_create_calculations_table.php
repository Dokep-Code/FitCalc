<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->decimal('weight_kg', 5, 2);
            $table->unsignedSmallInteger('height_cm');
            $table->unsignedTinyInteger('age');
            $table->string('sex');
            $table->string('activity_level');
            $table->string('goal');

            $table->decimal('bmi', 5, 2);
            $table->unsignedSmallInteger('bmr');
            $table->unsignedSmallInteger('tdee');
            $table->unsignedSmallInteger('target_calories');
            $table->unsignedSmallInteger('protein_g');
            $table->unsignedSmallInteger('fat_g');
            $table->unsignedSmallInteger('carbs_g');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculations');
    }
};
