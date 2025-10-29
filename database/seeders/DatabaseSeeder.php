<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Importáljuk az összes Seedert, amit futtatni akarunk
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\KategoriaSeeder;
use Database\Seeders\PizzaSeeder;
use Database\Seeders\RendelesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Futtatja az összes szükséges Seeder-t a helyes sorrendben.
     */
    public function run(): void
    {
        // 1. Admin felhasználó (marad a 2. pontból)
        $this->call(AdminUserSeeder::class);

        // 2. Új Seederek futtatása (a .txt fájlok alapján)
        // FONTOS: A sorrend számít a külső kulcsok miatt!
        $this->call([
            KategoriaSeeder::class, // Ennek kell először lefutnia
            PizzaSeeder::class,     // Ezután jöhet a Pizza (a Kategoriára hivatkozik)
            RendelesSeeder::class,  // Ezután jöhet a Rendelés (a Pizzára hivatkozik)
        ]);

        // A régi, már nem használt Seedereket innen töröld ki vagy tedd kommentbe,
        // pl. a régi IngredientSeeder::class és a régi PizzaSeeder::class (ha még léteznek)
        // $this->call(IngredientSeeder::class); // Régi - már nem kell
    }
}