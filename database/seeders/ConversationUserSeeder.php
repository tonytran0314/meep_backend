<?php

namespace Database\Seeders;

use App\Models\ConversationUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConversationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConversationUser::create([
            'conversation_id' => 1,
            'user_id' => 1
        ]);
        ConversationUser::create([
            'conversation_id' => 1,
            'user_id' => 2
        ]);
        ConversationUser::create([
            'conversation_id' => 1,
            'user_id' => 3
        ]);
        ConversationUser::create([
            'conversation_id' => 2,
            'user_id' => 1
        ]);
        ConversationUser::create([
            'conversation_id' => 2,
            'user_id' => 3
        ]);
        ConversationUser::create([
            'conversation_id' => 3,
            'user_id' => 1
        ]);
        ConversationUser::create([
            'conversation_id' => 3,
            'user_id' => 4
        ]);
    }
}
