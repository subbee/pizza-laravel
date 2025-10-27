<?php

namespace Database\Seeders; // EZT A SORT KELL HOZZÁADNUNK!

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin felhasználó (admin@pizza.hu / password)
        User::firstOrCreate(
            ['email' => 'admin@pizza.hu'],
            [
                'name' => 'Pizza Admin',
                'password' => Hash::make('password'),
                'role' => 'admin', // Beállítjuk a szerepkört 'admin'-ra
                'email_verified_at' => now(),
            ]
        );

        // 2. Regisztrált felhasználó (user@pizza.hu / password)
        User::firstOrCreate(
            ['email' => 'user@pizza.hu'],
            [
                'name' => 'Regisztrált Látogató',
                'password' => Hash::make('password'),
                'role' => 'regisztralt_latogato', // Beállítjuk a szerepkör
                'email_verified_at' => now(),
            ]
        );
    }
}
