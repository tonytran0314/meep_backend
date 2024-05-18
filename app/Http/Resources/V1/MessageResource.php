<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'senderId' => $this->sender_id,
            'receiverId' => $this->receiver_id,
            'conversationId' => $this->conversation_id,
            'content' => $this->content,
            'time' => $this->created_at
        ];
    }
}
