<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategoria;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema; // Szükséges a Schema::disableForeignKeyConstraints()-hez

class KategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Külső kulcsok kikapcsolása
        Schema::disableForeignKeyConstraints();

        // Tábla ürítése
        Kategoria::truncate();

        // Külső kulcsok visszakapcsolása
        Schema::enableForeignKeyConstraints();

        $file_path = database_path('data/kategoria.txt');

        if (!File::exists($file_path)) {
            $this->command->error("Hiba: A kategoria.txt fájl nem található a 'database/data' mappában!");
            return;
        }

        $file = File::get($file_path);
        $lines = explode(PHP_EOL, $file);

        $data = [];
        $isFirstLine = true;

        foreach ($lines as $line) {
            if (empty(trim($line))) continue;
            if ($isFirstLine) { $isFirstLine = false; continue; }

            $parts = explode("\t", $line);
            if (count($parts) === 2) {
                $data[] = [ 'nev' => $parts[0], 'ar' => (int)$parts[1] ];
            }
        }

        Kategoria::insert($data);
        $this->command->info(count($data) . " kategória sikeresen beillesztve.");
    }
}
