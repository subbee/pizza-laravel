<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $file = database_path('data/kategoria.txt');
        $lines = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            [$nev, $ar] = explode("\t", $line);
            DB::table('kategorias')->insert([
                'nev' => $nev,
                'ar' => (int)$ar,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
