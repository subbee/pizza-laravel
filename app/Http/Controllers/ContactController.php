<?php
// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // Üzenet modell

class ContactController extends Controller
{
    // 1. Megjeleníti a Kapcsolat űrlapot
    public function show()
    {
        return view('contact.show');
    }

    // 2. A beküldött űrlap adatainak feldolgozása (POST)
    public function store(Request $request)
    {
        // KÖTELEZŐ: Szerver oldali validáció
        $validatedData = $request->validate([
            'nev' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'uzenet' => 'required|string|min:10',
        ], [
            'nev.required' => 'A név megadása kötelező.',
            'email.required' => 'Az e-mail cím megadása kötelező.',
            'uzenet.required' => 'Az üzenet mező kitöltése kötelező.',
            'uzenet.min' => 'Az üzenetnek legalább :min karakter hosszúnak kell lennie.',
        ]);

        // KÖTELEZŐ: Adatok mentése az adatbázisba
        Message::create($validatedData);

        // Visszajelzés
        return redirect()->route('contact.show')->with('success', 'Köszönjük üzenetét! Sikeresen rögzítettük.');
    }
}