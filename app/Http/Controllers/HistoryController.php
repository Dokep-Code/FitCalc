<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class HistoryController extends Controller
{
    public function index(Request $request): View
    {
        $calculations = $request->user()
            ->calculations()
            ->paginate(10);

        return view('history.index', ['calculations' => $calculations]);
    }

    public function destroy(Calculation $calculation): RedirectResponse
    {
        Gate::authorize('delete', $calculation);

        $calculation->delete();

        return redirect()->route('history.index')->with('status', 'Obliczenie zostało usunięte.');
    }
}
