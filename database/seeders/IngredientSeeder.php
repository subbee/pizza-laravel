<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Seed the Ingredients table.
     */
    public function run(): void
    {
        $ingredients = [
            ['name' => 'Füstölt sonka'],
            ['name' => 'Gomba'],
            ['name' => 'Kukorica'],
            ['name' => 'Fekete olíva'],
            ['name' => 'Bacon'],
            ['name' => 'Hagyma'],
            ['name' => 'Pepperoni szalámi'],
            ['name' => 'Parmezán sajt'],
            ['name' => 'Rukkola'],
            ['name' => 'Mozzarella sajt'],
        ];

        DB::table('ingredients')->insert($ingredients);
    }
}
