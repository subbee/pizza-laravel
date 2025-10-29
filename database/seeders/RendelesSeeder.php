<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rendeles; // Használjuk a Modellt
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema; // Szükséges
use Carbon\Carbon; // Dátumkezeléshez

class RendelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Beolvassa a rendeles.txt fájlt és feltölti az adatbázist.
     */
    public function run(): void
    {
        // Külső kulcsok kikapcsolása a truncate miatt
        Schema::disableForeignKeyConstraints();
        Rendeles::truncate();
        Schema::enableForeignKeyConstraints();

        $file_path = database_path('data/rendeles.txt');

        if (!File::exists($file_path)) {
            $this->command->error("Hiba: A rendeles.txt fájl nem található a 'database/data' mappában!");
            return;
        }

        $file = File::get($file_path);
        $lines = explode(PHP_EOL, $file); // Sorokra bontás

        $data = [];
        $isFirstLine = true; // Fejléc sor átugrásához (pizzanev, darab, felvetel, kiszallitas)
        $lineNumber = 0; // Sor számolása hibakereséshez

        foreach ($lines as $line) {
            $lineNumber++;
            // Üres sorok átugrása
            if (empty(trim($line))) {
                continue;
            }

            // Fejléc átugrása
            if ($isFirstLine) {
                $isFirstLine = false;
                continue;
            }

            // Tabulátorral elválasztott adatok
            $parts = explode("\t", $line);

            // Ellenőrizzük, hogy megvan-e mind a 4 rész és a pizzanév nem üres
            if (count($parts) === 4 && !empty(trim($parts[0]))) {
                 // Dátumok formázása YYYY-MM-DD HH:MM:SS formátumra a Carbon segítségével
                 // Kezeljük a lehetséges hibás dátumformátumokat
                 try {
                     $felvetelDate = Carbon::createFromFormat('Y.m.d H:i:s', trim($parts[2]))->format('Y-m-d H:i:s');
                     // A kiszállítás lehet üres, ekkor null értéket adunk
                     $kiszallitasDate = !empty(trim($parts[3])) ? Carbon::createFromFormat('Y.m.d H:i:s', trim($parts[3]))->format('Y-m-d H:i:s') : null;

                     $data[] = [
                         'pizzanev' => trim($parts[0]),
                         'darab' => (int)trim($parts[1]),
                         'felvetel' => $felvetelDate,
                         'kiszallitas' => $kiszallitasDate, // Null lesz, ha üres volt a string
                     ];
                 } catch (\Exception $e) {
                     // Hibás dátumformátum esetén figyelmeztetést írunk ki és kihagyjuk a sort
                     $this->command->warn("Figyelmeztetés: Hibás dátumformátum a(z) {$lineNumber}. sorban a rendeles.txt fájlban. Sor kihagyva: " . $line . " Hiba: " . $e->getMessage());
                     continue; // Kihagyjuk ezt a sort
                 }
            } elseif (count($parts) === 4) {
                 // Figyelmeztetés üres pizzanév esetén
                 $this->command->warn("Figyelmeztetés: Üres pizzanév a rendeles.txt fájl {$lineNumber}. sorában. Sor kihagyva.");
            } else {
                // Figyelmeztetés hibás darabszámú adatok esetén
                 $this->command->warn("Figyelmeztetés: Hibás adatszerkezet a rendeles.txt fájl {$lineNumber}. sorában. Sor kihagyva: " . $line);
            }
        }

        // Adatok beillesztése az adatbázisba kisebb darabokban (chunking)
        // Ez segít elkerülni a memóriakorlátokat és a túl hosszú lekérdezéseket
        foreach (array_chunk($data, 500) as $chunk) {
             try {
                 Rendeles::insert($chunk);
             } catch (\Illuminate\Database\QueryException $e) {
                 // Hibakezelés beillesztéskor (pl. ha egy pizzanév nem létezik a pizzas táblában)
                 $this->command->error("Hiba a rendelések egy darabjának beillesztésekor: " . $e->getMessage());
                 // Itt lehetne logolni a $chunk tartalmát a pontosabb hibakereséshez
                 // pl. logger()->error('Hiba a chunk beillesztésekor: ', ['chunk' => $chunk, 'error' => $e->getMessage()]);
             }
         }

        $this->command->info(count($data) . " rendelés sikeresen feldolgozva és megpróbálva beilleszteni (részletek a logban/figyelmeztetésekben).");
    }
}
