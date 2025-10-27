<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Futtatja a pizzák és a hozzájuk tartozó összetevők feltöltését.
     */
    public function run(): void
    {
        // Összetevők betöltése, hogy könnyen elérhetőek legyenek
        $ingredients = DB::table('ingredients')->pluck('id', 'name')->toArray();

        // Pizzák adatai, beleértve a hozzájuk tartozó összetevőket (nevek alapján)
        $pizzas = [
            [
                'name' => 'Margherita',
                'price' => 2000,
                'ingredients' => ['paradicsomszósz', 'mozzarella'],
            ],
            [
                'name' => 'Prosciutto',
                'price' => 2400,
                'ingredients' => ['paradicsomszósz', 'mozzarella', 'sonka'],
            ],
            [
                'name' => 'Funghi',
                'price' => 2200,
                'ingredients' => ['paradicsomszósz', 'mozzarella', 'gomba'],
            ],
            [
                'name' => 'Diavola',
                'price' => 2800,
                'ingredients' => ['paradicsomszósz', 'mozzarella', 'csípős szalámi', 'chili pehely'],
            ],
            // Ide jöhetnek további pizzák
        ];

        foreach ($pizzas as $pizzaData) {
            // 1. Pizza beszúrása és az ID lekérése
            $pizzaId = DB::table('pizzas')->insertGetId([
                'name' => $pizzaData['name'],
                'price' => $pizzaData['price'],
                'updated_at' => now(),
                'created_at' => now(),
            ]);

            // 2. Kapcsolótábla feltöltése (pizza_ingredient)
            $pivotData = [];
            foreach ($pizzaData['ingredients'] as $ingredientName) {
                // Ellenőrizzük, hogy az összetevő létezik-e, mielőtt beszúrjuk
                if (isset($ingredients[$ingredientName])) {
                    $pivotData[] = [
                        'pizza_id' => $pizzaId,
                        'ingredient_id' => $ingredients[$ingredientName],
                    ];
                }
            }
            
            // Csak akkor szúrunk be, ha van hozzárendelt összetevő
            if (!empty($pivotData)) {
                DB::table('pizza_ingredient')->insert($pivotData);
            }
        }
    }
}
