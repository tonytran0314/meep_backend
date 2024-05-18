<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\MessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ConversationContentResource;
use App\Http\Resources\V1\ConversationResource;
use App\Http\Resources\V1\MessageResource;
use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // get conversations list
    public function conversations(Request $request) {
        $user_id = $request->user()->id;

        return ConversationResource::collection(User::find($user_id)->conversations()->get());
    }

    public function addMessage(Request $request) {
        // REMEMBER TO VALIDATE 

        $senderId = $request->user()->id;
        $conversationId = $request->conversation_id;

        // Có thể cân nhắc bỏ receiver id 
        $receivers = Conversation::find($conversationId)->users()->where('id', '<>', $senderId)->get();
        $receiverId = ($receivers->count() === 1) ? $receivers[0]->id : null;

        $newMessage = new Message();
        $newMessage->sender_id = $senderId;
        $newMessage->receiver_id = $receiverId;
        $newMessage->conversation_id = $conversationId;
        $newMessage->content = $request->content;
        $newMessage->save();

        MessageEvent::dispatch(new MessageResource($newMessage));
    }

    // get content of a conversation
    public function getMessages(Request $request, $conversationId) {
        // RETURN A RESOURCES WITH LIMIT 20, 
        // IF THE USER SCROLL UP TO SEE THE PREVIOUS MESSAGES, THEN SEND A REQUEST TO LOAD NEXT 20 MESSAGES

        // REMEMBER TO CHECK IF THE USER WHO IS REQUESTING THE CONVERSION BELONG TO THAT CONVERSION OR NOT
        // should be currentChat because this would contain avatar and name, not just name
        $conversationName = Conversation::current($conversationId)->pluck('name');
        $messages = Message::conversation($conversationId)->get();
        $data = [
            // chỗ này nó return array, hơi dỡ, nên return string thôi. Vì tên chỉ có một thôi mà
            'name' => $conversationName,
            'messages' => MessageResource::collection($messages)
        ];
        return new ConversationContentResource($data);
    }
}
