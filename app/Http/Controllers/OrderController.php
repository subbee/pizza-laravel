<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Rendeles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["orders"] = Rendeles::orderBy("felvetel", "DESC")->get();

        return view("admin.rendelesek.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($pizza_id)
    {
        $data["user"]= Auth::user();
        $data["pizza"] = Pizza::find($pizza_id);

        return view('pizza.rendeles', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|integer',
            'darab' => 'required|integer',
            'user_id' => 'required|integer',
            'cim' => 'required|string'
        ]);
        $data["order"] = Rendeles::create($validated);
        return view('pizza.rendeles_leadva', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
