<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function messages(): HasMany {
        return $this->hasMany(Message::class);
    }

    public function scopeCurrent($query, $conversationId) {
        return $query->where('id', $conversationId);
    }
}
