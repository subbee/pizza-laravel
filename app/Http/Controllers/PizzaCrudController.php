<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaCrudController extends Controller
{
    public function index()
    {
        $pizzak = Pizza::all();
        return view('admin.pizzak.index', compact('pizzak'));
    }

    public function create()
    {
        return view('admin.pizzak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'kategorianev' => 'required|string|max:255',
            'vegetarianus' => 'boolean',
        ]);

        Pizza::create([
            'nev' => $request->nev,
            'kategorianev' => $request->kategorianev,
            'vegetarianus' => $request->has('vegetarianus'),
        ]);

        return redirect()->route('admin.pizzak.index')
            ->with('success', 'Új pizza sikeresen hozzáadva!');
    }

    public function edit(Pizza $pizzak)
    {
        return view('admin.pizzak.edit', compact('pizzak'));
    }

    public function update(Request $request, Pizza $pizzak)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'kategorianev' => 'required|string|max:255',
            'vegetarianus' => 'boolean',
        ]);

        $pizzak->update([
            'nev' => $request->nev,
            'kategorianev' => $request->kategorianev,
            'vegetarianus' => $request->has('vegetarianus'),
        ]);

        return redirect()->route('admin.pizzak.index')
            ->with('success', 'A pizza sikeresen frissítve lett!');
    }

    public function destroy(Pizza $pizzak)
    {
        $pizzak->delete();

        return redirect()->route('admin.pizzak.index')
            ->with('success', 'A pizza törölve lett!');
    }
}
