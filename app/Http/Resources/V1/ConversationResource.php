<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Models\Conversation;

class ConversationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $requestingId = $request->user()->id;
        $members = Conversation::find($this->id)->users()->get();
        
        $avatar = ($this->type === 'g') ? 
        'default_group.jpg' : 
        Conversation::find($this->id)
            ->users()
            ->where('id', '<>', $requestingId)
            ->value('avatar');
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'avatar' => Storage::url($avatar),
            'membersNumber' => count($members),
            'members' => UserResource::collection($members),
        ];
    }
}
