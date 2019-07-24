<?php

namespace App\Listeners;

use App\Events\UserLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use Carbon\Carbon;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLogin  $event
     * @return void
     */
    public function handle(UserLogin $event)
    {
        $logged_in_user = User::where('id','=',$event->user['id'])->first();
        $logged_in_user->last_activity_at = Carbon::now()->toDateTimeString();
        $logged_in_user->save();
    }
}
