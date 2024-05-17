<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conversation;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conversation::create([
            'name' => 'Conver 1'
        ]);
        Conversation::create([
            'name' => 'Conver 2'
        ]);
        Conversation::create([
            'name' => 'Conver 3'
        ]);
    }
}
