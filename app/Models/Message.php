<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'conversation_id',
        'content'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function scopeConversation($query, $conversationId) {
        return $query->where('conversation_id', $conversationId);
    }
}
