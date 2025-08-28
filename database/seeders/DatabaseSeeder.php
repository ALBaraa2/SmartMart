<?php

namespace Database\Seeders;

use App\Models\Role;
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
            'name' => 'ALBaraa',
            'email' => 'albaraa@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Role::factory()->create([
            'name' => 'admin',
        ]);

        Role::factory()->create([
            'name' => 'supermarket_manager',
        ]);

        Role::factory()->create([
            'name' => 'customer',
        ]);
    }
}
