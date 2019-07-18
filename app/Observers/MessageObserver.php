<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Message;
use App\User;
use App\Events\StatusChanged;

class MessageObserver
{
    public function creating(Message $message)
    {
        $user = User::where('id','=',$message->user_id)->first();
        $user->last_activity_at = Carbon::now()->toDateTimeString();
        $user->save();

        event(new StatusChanged($user));
    }
}