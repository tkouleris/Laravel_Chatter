<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\FormSubmited;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $message = request()->message;
        event(new FormSubmited($message));
    }

}
