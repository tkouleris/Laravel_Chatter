<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

class UserLogin implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user = array();
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $user = User::where('id','=',$user->id)->first();
        $this->user['time_since_last_activity_readable'] = $user->time_since_last_activity('h');
        $this->user['time_since_last_activity_minutes_diff'] = $user->time_since_last_activity('m');
        $this->user['id'] = $user->id;
        $this->user['name'] = $user->name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    public function broadcastAs()
    {
        return 'user_login';
    }
}
