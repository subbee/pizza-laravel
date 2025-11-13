<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Rendeles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function chartData(Request $request)
    {
        $month = $request->input('month', date('Y-m'));
        $start = Carbon::parse($month . '-01')->startOfMonth();
        $end = $start->copy()->endOfMonth();

        $data = DB::table('rendeles')
            ->selectRaw('DATE(felvetel) as day, SUM(darab) as total')
            ->whereBetween('felvetel', [$start, $end])
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        // Összes nap a hónapban, hiányzó napokat 0-val töltjük
        $daysInMonth = $start->daysInMonth;
        $labels = [];
        $values = [];

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $day = $start->copy()->day($i)->toDateString();
            $labels[] = $i;
            $values[] = $data->firstWhere('day', $day)->total ?? 0;
        }

        return response()->json([
            'labels' => $labels,
            'values' => $values,
            'month' => $start->format('Y-m'),
            'month_name' => $start->translatedFormat('F Y'),
        ]);
    }


}
