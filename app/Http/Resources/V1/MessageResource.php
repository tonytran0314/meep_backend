<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MessageResource extends JsonResource
{
    // public static $wrap = null;
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

    // public static function collection($resource)
    // {
    //     return tap(new MessageResource($resource), function ($collection) {
    //         $collection->collects = static::class;
    //     });
    // }
}

// class YourResourceCollection extends ResourceCollection
// {
//     public static $wrap = 'custom_data';

//     /**
//      * Transform the resource collection into an array.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return array
//      */
//     public function toArray($request)
//     {
//         return $this->collection;
//     }
// }