<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\FormSubmited;
use Illuminate\Support\Facades\Auth;
use App\Message;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $message = request()->message;
        $user_id = Auth::id();

        Message::create(['message'=>$message, 'user_id'=>$user_id]);

        event(new FormSubmited($message));
    }

}
