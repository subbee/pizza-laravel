<?php

namespace App\Http\Controllers;

use App\Models\Message; // Használjuk a Message Modellt
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; // Redirect válaszhoz

class ContactController extends Controller
{
    /**
     * Megjeleníti a kapcsolat űrlapot (5. pont).
     */
    public function show(): View
    {
        return view('contact.show', ['pageTitle' => 'Kapcsolat']);
    }

    /**
     * Feldolgozza a kapcsolat űrlapot, validálja és elmenti az adatbázisba (5. pont).
     */
    public function store(Request $request): RedirectResponse
    {
        // Szerver oldali validáció (5. pont követelmény)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10', // Minimum 10 karakteres üzenet
        ]);

        // Adatbázisba mentés az Eloquent ORM segítségével (5. pont követelmény)
        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            // A küldés idejét a Laravel automatikusan kezeli (created_at)
        ]);

        // Sikeres mentés után visszairányítás egy üzenettel
        return redirect()->route('contact.show')->with('success', 'Üzenetét sikeresen elküldtük!');
    }
}
