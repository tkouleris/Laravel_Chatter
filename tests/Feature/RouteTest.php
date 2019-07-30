<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{

    public function test_chatter_unauthorized_route()
    {
        $response = $this->get('/chatter');

        $response->assertRedirect('/login');
    }

    public function test_chatter_authorized_route()
    {
        $user = \App\User::find(1);
        $this->be($user);

        $response = $this->get('/chatter');

        $response->assertOK(200);
    }
}
