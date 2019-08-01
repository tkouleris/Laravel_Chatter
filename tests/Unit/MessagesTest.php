<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

class MessagesTest extends TestCase
{

    public function test_a_message_can_be_stored_in_database()
    {
        $this->withoutExceptionHandling();
        $this->withoutEvents();
        \App\Message::unsetEventDispatcher();

        $user = \App\User::find(1);
        $this->be($user);
        $response = $this->post('/send',[
            'message'=>'PHPUnit Testing Message',
        ]);

        $response->assertOK();
    }

    // public function test_a_message_can_change_user_last_active_at_field()
    // {
    //     $this->withoutExceptionHandling();

    //     $user = \App\User::find(1);

    //     $this->be($user);

    //     $timestamp_before_message = $user->last_activity_at;

    //     $response = $this->post('/send',[
    //         'message'=>"$timestamp_before_message",
    //     ]);
    //     $response->assertOK();

    //     sleep(5);

    //     $response = $this->post('/send',[
    //         'message'=>'PHPUnit Testing Message 2',
    //     ]);
    //     $response->assertOK();
    //     $timestamp_after_message = $user->last_activity_at;

    //     sleep(5);

    //     $response = $this->post('/send',[
    //         'message'=>"$timestamp_after_message",
    //     ]);
    //     $response->assertOK();

    //     $this->assertNotEquals($timestamp_before_message, $timestamp_after_message );
    // }
}
