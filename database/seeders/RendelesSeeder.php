<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RendelesSeeder extends Seeder
{
    public function run(): void
    {
        $file = database_path('data/rendeles.txt');
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $first = true;
        foreach ($lines as $line) {
            if ($first) {
                $first = false; // fejléc kihagyása
                continue;
            }

            $parts = explode("\t", $line);

            if (count($parts) < 5) continue; // ha hibás sor, kihagyjuk

            [$pizzanev, $darab, $felvetel, $kiszallitas] = array_slice($parts, 1);

            DB::table('rendeles')->insert([
                'pizzanev' => $pizzanev,
                'darab' => (int)$darab,
                'felvetel' => $felvetel,
                'kiszallitas' => $kiszallitas,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
