<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    // 🍕 Publikus pizza menü
    public function index(): View
    {
        $pizzak = Pizza::with('kategoria')
            ->orderBy('nev')
            ->get();

        return view('pizza.menu', [
            'pizzak' => $pizzak,
            'pageTitle' => 'Pizza Menü (Új Struktúra)'
        ]);
    }

    // 📊 Diagram oldal
    public function diagram()
    {
        $pizzaSales = DB::table('rendeles')
            ->select('pizzanev', DB::raw('SUM(darab) as total_darab'))
            ->groupBy('pizzanev')
            ->orderByDesc('total_darab')
            ->limit(10)
            ->get();

        $labels = $pizzaSales->pluck('pizzanev')->toArray();
        $data = $pizzaSales->pluck('total_darab')->toArray();

        return view('pizza.diagram', compact('labels', 'data'));
    }
}

