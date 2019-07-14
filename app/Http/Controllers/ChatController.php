<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at','desc')
                            ->take(5)
                            ->get();
        $messages = $messages->reverse();

        return view('chatter',['messages'=> $messages]);
    }
}
