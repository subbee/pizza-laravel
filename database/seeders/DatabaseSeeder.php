<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,     // 2. Pont: Admin/Felhasználó
            IngredientSeeder::class,    // 4. Pont: Összetevők
            PizzaSeeder::class,         // 4. Pont: Pizzák és Kapcsolat
        ]);
    }
}
