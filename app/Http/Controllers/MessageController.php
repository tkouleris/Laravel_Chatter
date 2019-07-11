<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Message;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $message = request()->message;
        $user_id = Auth::id();

        $new_message = Message::create(['message'=>$message, 'user_id'=>$user_id]);
        $user = User::find($user_id);

        event(new MessageSent($new_message,$user));
    }

}
