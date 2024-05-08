<?php

namespace Database\Seeders;

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
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => 'user1pw',
        ]);
        User::factory()->create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => 'user2@pw',
        ]);
        User::factory()->create([
            'name' => 'User 3',
            'email' => 'user3@example.com',
            'password' => 'user3@pw',
        ]);
        User::factory()->create([
            'name' => 'User 4',
            'email' => 'user4@example.com',
            'password' => 'user4@pw',
        ]);
        User::factory()->create([
            'name' => 'User 5',
            'email' => 'user5@example.com',
            'password' => 'user5pw',
        ]);
    }
}
