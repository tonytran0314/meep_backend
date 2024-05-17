<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationUser extends Model
{
    use HasFactory;

    protected $table = 'conversation_user';

    protected $fillable = [
        'conversation_id',
        'user_id'
    ];
}
