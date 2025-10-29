<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza; // Használjuk a Modellt
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema; // Szükséges

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Beolvassa a pizza.txt fájlt és feltölti az adatbázist.
     */
    public function run(): void
    {
        // Külső kulcsok kikapcsolása a truncate miatt (a rendeles tábla hivatkozhat rá)
        Schema::disableForeignKeyConstraints();
        Pizza::truncate();
        Schema::enableForeignKeyConstraints();

        $file_path = database_path('data/pizza.txt');

        if (!File::exists($file_path)) {
            $this->command->error("Hiba: A pizza.txt fájl nem található a 'database/data' mappában!");
            return;
        }

        $file = File::get($file_path);
        $lines = explode(PHP_EOL, $file);

        $data = [];
        $isFirstLine = true; // Fejléc átugrása (nev, kategorianev, vegetarianus)

        foreach ($lines as $line) {
            if (empty(trim($line))) continue;
            if ($isFirstLine) { $isFirstLine = false; continue; }

            $parts = explode("\t", $line);

            // Ellenőrizzük, hogy a kategórianév ne legyen üres
            if (count($parts) === 3 && !empty(trim($parts[1]))) {
                $data[] = [
                    'nev' => trim($parts[0]),
                    'kategorianev' => trim($parts[1]),
                    'vegetarianus' => (int)trim($parts[2]) === 1, // 1 (igaz) vagy 0 (hamis)
                ];
            } elseif (count($parts) === 3) {
                 $this->command->warn("Figyelmeztetés: Üres kategórianév a pizza.txt fájlban a következő pizzánál: " . trim($parts[0]));
            }
        }

        try {
            Pizza::insert($data);
            $this->command->info(count($data) . " pizza sikeresen beillesztve.");
        } catch (\Illuminate\Database\QueryException $e) {
             $this->command->error("Hiba a pizzák beillesztésekor: " . $e->getMessage());
             
        }
    }
}

