<?php

namespace Database\Seeders; // EZ A HIÁNYZÓ SOR KELL!

use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class, 
        ]);
    }
}
