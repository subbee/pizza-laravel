<?php

namespace App\Http\Controllers;

use App\Models\Pizza; // Import the Pizza Model
use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View class

class PizzaController extends Controller
{
    /**
     * Display all pizzas with their kategoria (Task 4 - Updated structure).
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {

        $pizzas = Pizza::with('kategoria')
                       ->orderBy('nev')
                       ->get();


        return view('pizza.menu', [
            'pizzas' => $pizzas,
            'pageTitle' => 'Pizza Menü (Új Struktúra)'
        ]);
    }


    // 7. Diagram menü
    public function diagram()
    {
        // Lekérdezzük a pizzákat és összesítjük a rendelt darabszámot
        $pizzaSales = DB::table('rendeles')
            ->select('pizzanev', DB::raw('SUM(darab) as total_darab'))
            ->groupBy('pizzanev')
            ->orderByDesc('total_darab')
            ->limit(10) // Megjelenítjük a top 10 pizzát
            ->get();

        // Előkészítjük az adatokat a Chart.js számára
        $labels = $pizzaSales->pluck('pizzanev')->toArray();
        $data = $pizzaSales->pluck('total_darab')->toArray();

        return view('pizza.diagram', compact('labels', 'data'));
    }

}

