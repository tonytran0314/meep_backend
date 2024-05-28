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
            'name' => 'Conver 1',
            'type' => 'g',
            'avatar' => 'public/default_group.jpg'
        ]);
        Conversation::create([
            'name' => 'Conver 2',
            'type' => 'a',
            'avatar' => null
        ]);
        Conversation::create([
            'name' => 'Conver 3',
            'type' => 'a',
            'avatar' => null
        ]);
    }
}
