<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\MessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MessageResouce;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function addMessage(Request $request) {
        // REMEMBER TO VALIDATE 

        $newMessage = new Message();
        $newMessage->sender_id = $request->sender_id;
        $newMessage->receiver_id = $request->receiver_id;
        $newMessage->content = $request->content;
        $newMessage->save();

        MessageEvent::dispatch(new MessageResouce($newMessage));
    }

    public function getMessages() {
        // RETURN A RESOURCES WITH LIMIT 20, 
        // IF THE USER SCROLL UP TO SEE THE PREVIOUS MESSAGES, THEN SEND A REQUEST TO LOAD NEXT 20 MESSAGES
        return MessageResouce::collection(Message::all());
    }
}
