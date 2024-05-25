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
        $avatars = Conversation::find($this->id)->users()->where('id', '<>', $requestingId)->pluck('avatar');
        $members = Conversation::find($this->id)->users()->get();
        
        $defaultGroupAvatar = '/default_group.jpg';

        // should have another machanism to determine group chat or 1-1 chat
        $avatar = (count($avatars) < 2) ? $avatars[0] : $defaultGroupAvatar;

        return [
            'avatar' => Storage::url($avatar),
            'id' => $this->id,
            'name' => $this->name,
            'membersNumber' => count($members),
            'members' => UserResource::collection($members),
        ];
    }
}
