<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Benjie Lenteria',
            'email' => 'lentrix@materdeicollege.com',
            'password' => bcrypt('password123'),
        ]);

        $this->call(PersonSeeder::class);
        $this->call(InvestmentSeeder::class);
    }
}
