<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rendeles;
use App\Models\User;
use App\Models\Pizza;
use Faker\Factory as Faker;

class RendelesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Lekérjük a felhasználókat és pizzákat
        $users = User::all();
        $pizzas = Pizza::all();

        if ($users->isEmpty() || $pizzas->isEmpty()) {
            $this->command->info("Nincs felhasználó vagy pizza a seedeléshez!");
            return;
        }

        for ($i = 0; $i < 3000; $i++) {
            // Random felvétel az elmúlt 20 napból
            $felvetel = $faker->dateTimeBetween('-360 days', 'now');

            // Kiszállítás: felvétel után 0-2 órával
            $kiszallitas = (clone $felvetel)->modify('+' . rand(0, 2) . ' hours');

            Rendeles::create([
                'user_id' => $users->random()->id,
                'pizza_id' => $pizzas->random()->id,
                'darab' => rand(1, 5),
                'cim' => $faker->address(),
                'felvetel' => $felvetel,
                'kiszallitas' => $kiszallitas,
            ]);
        }
    }
}
