<?php

namespace App\Http\Controllers;

use App\Models\Pizza; // Import the Pizza Model
use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View class

class PizzaController extends Controller
{
    /**
     * Display all pizzas with their ingredients (Task 4).
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Query all pizzas and eagerly load their ingredients relationship (using ORM)
        // This helps avoid the N+1 query problem.
        $pizzas = Pizza::with('ingredients')->orderBy('name')->get(); // Get all pizzas with ingredients, ordered by name

        // Pass the data (the collection of pizzas) to the view
        return view('pizza.menu', [
            'pizzas' => $pizzas,
            'pageTitle' => 'Pizza Menü' // Optional: Set a title for the page
        ]);
    }
}