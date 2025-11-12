<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    public function run(): void
    {
        $file = database_path('data/pizza.txt');

        // beolvassuk a sorokat, üres sorokat kihagyjuk
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $first = true; // az első sor a fejléc: "nev  kategorianev  vegetarianus"

        foreach ($lines as $line) {
            if ($first) {
                $first = false;
                continue; // fejléc kihagyása
            }

            // 3 oszlop: nev, kategorianev, vegetarianus
            $parts = explode("\t", $line);

            if (count($parts) < 3) {
                continue; // ha véletlen hibás sor lenne, átugorjuk
            }

            [$nev, $kategorianev, $vegetarianus] = $parts;

            DB::table('pizzas')->insert([
                'nev'          => $nev,
                'kategorianev' => $kategorianev,
                'vegetarianus' => (bool) $vegetarianus,
            ]);
        }
    }
}
