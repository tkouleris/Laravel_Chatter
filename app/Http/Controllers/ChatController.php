<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\User;

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

        $logged_in_users = User::where('last_activity_at','>=',time()-(1*60*60))->get();

        return view('chatter',[
                                'messages'=> $messages,
                                'user_id' => $user_id,
                                'logged_in_users' => $logged_in_users
                            ]);
    }
}
