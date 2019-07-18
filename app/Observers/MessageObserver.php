<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Message;
use App\User;


class MessageObserver
{
    public function creating(Message $message)
    {
        $user = User::where('id','=',$message->user_id)->first();
        $user->last_activity_at = Carbon::now()->toDateTimeString();
        $user->save();
    }
}