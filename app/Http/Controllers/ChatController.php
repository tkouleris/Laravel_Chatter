<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')
                            ->orderBy('created_at','desc')
                            ->take(5)
                            ->get();

        $messages = $messages->reverse();

        $user_id = Auth::id();

        return view('chatter',['messages'=> $messages,'user_id'=>$user_id]);
    }
}
