<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'user1',
            'display_name' => 'User 1',
            'identify_number' => '352',
            'email' => 'user1@example.com',
            'avatar' => 'public/user1.jpg'
        ]);
        User::factory()->create([
            'username' => 'user2',
            'display_name' => 'User 2',
            'identify_number' => '152',
            'email' => 'user2@example.com',
            'avatar' => 'public/user2.jpg'
        ]);
        User::factory()->create([
            'username' => 'user3',
            'display_name' => 'User 3',
            'identify_number' => '32',
            'email' => 'user3@example.com',
            'avatar' => 'public/user3.jpg'
        ]);
        User::factory()->create([
            'username' => 'user4',
            'display_name' => 'User 4',
            'identify_number' => '8542',
            'email' => 'user4@example.com',
            'avatar' => 'public/user4.jpg'
        ]);
        User::factory()->create([
            'username' => 'user5',
            'display_name' => 'User 5',
            'identify_number' => '909',
            'email' => 'user5@example.com',
            'avatar' => 'public/user5.jpg'
        ]);
    }
}
