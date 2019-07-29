<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

class MessagesTest extends TestCase
{

    use WithoutMiddleware;
    //use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
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
}
