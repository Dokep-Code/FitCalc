<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use App\Services\FitnessCalculator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class CalculatorController extends Controller
{
    public function create(): View
    {
        return view('calculator.form');
    }

    public function store(Request $request, FitnessCalculator $calculator): RedirectResponse
    {
        $data = $request->validate([
            'weight_kg' => ['required', 'numeric', 'min:20', 'max:400'],
            'height_cm' => ['required', 'integer', 'min:100', 'max:250'],
            'age' => ['required', 'integer', 'min:10', 'max:120'],
            'sex' => ['required', 'in:male,female'],
            'activity_level' => ['required', 'in:sedentary,light,moderate,active,very_active'],
            'goal' => ['required', 'in:lose,maintain,gain'],
        ]);

        $results = $calculator->calculate($data);

        $calculation = $request->user()->calculations()->create([
            ...$data,
            ...$results,
        ]);

        return redirect()->route('calculator.results', $calculation);
    }

    public function show(Calculation $calculation): View
    {
        Gate::authorize('view', $calculation);

        return view('calculator.results', ['calculation' => $calculation]);
    }
}
