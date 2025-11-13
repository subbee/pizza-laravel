<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin',
            'email' => 'admin@pizzamester.hu',
            'email_verified_at'=>Carbon::now(),
            'password' => Hash::make('pizzapizza'),
            'role' => 'admin', // feltételezzük, hogy van role mező az users táblában
        ]);

        User::factory(50)->create();
    }
}
