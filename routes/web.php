<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProgramController::class, 'chooseGoal'])->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/calculator', [CalculatorController::class, 'create'])->name('calculator.create');
    Route::post('/calculator', [CalculatorController::class, 'store'])->name('calculator.store');
    Route::get('/calculator/results/{calculation}', [CalculatorController::class, 'show'])->name('calculator.results');

    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::delete('/history/{calculation}', [HistoryController::class, 'destroy'])->name('history.destroy');

    Route::get('/programy/{goal}', [ProgramController::class, 'goal'])->name('programs.goal');
    Route::get('/trening/{trainingPlan}', [ProgramController::class, 'showTraining'])->name('programs.training');
    Route::get('/dieta/{dietPlan}', [ProgramController::class, 'showDiet'])->name('programs.diet');
});

require __DIR__.'/auth.php';
