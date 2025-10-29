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
}

