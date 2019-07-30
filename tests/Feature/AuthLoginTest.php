<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthLoginTest extends TestCase
{
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();

        $response->assertViewIs('auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(\App\User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/chatter');
    }
}
