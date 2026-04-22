<?php

namespace App\Http\Controllers;

use App\Models\DietPlan;
use App\Models\TrainingPlan;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProgramController extends Controller
{
    private const GOALS = [
        'lose' => ['label' => 'Chudnięcie', 'tagline' => 'Spal tłuszcz, zachowaj siłę.'],
        'gain' => ['label' => 'Mięśnie',    'tagline' => 'Zbuduj masę i siłę.'],
    ];

    public function chooseGoal(): View
    {
        return view('programs.choose', ['goals' => self::GOALS]);
    }

    public function goal(string $goal): View
    {
        $this->ensureGoal($goal);

        $trainingPlans = TrainingPlan::where('goal', $goal)->withCount('exercises')->get();
        $dietPlans = DietPlan::where('goal', $goal)->withCount('dishes')->get();

        return view('programs.goal', [
            'goal' => $goal,
            'goalMeta' => self::GOALS[$goal],
            'trainingPlans' => $trainingPlans,
            'dietPlans' => $dietPlans,
        ]);
    }

    public function showTraining(TrainingPlan $trainingPlan): View
    {
        return view('programs.training', [
            'plan' => $trainingPlan,
            'days' => $trainingPlan->exercisesByDay(),
            'goalMeta' => self::GOALS[$trainingPlan->goal],
        ]);
    }

    public function showDiet(DietPlan $dietPlan): View
    {
        return view('programs.diet', [
            'plan' => $dietPlan,
            'meals' => $dietPlan->dishesByMeal(),
            'goalMeta' => self::GOALS[$dietPlan->goal],
        ]);
    }

    private function ensureGoal(string $goal): void
    {
        if (!isset(self::GOALS[$goal])) {
            throw new NotFoundHttpException();
        }
    }
}
