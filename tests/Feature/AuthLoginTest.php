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

    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(\App\User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $response = $this->post('/login', [
            'name' => $user->name,
            'password' => $password,
        ]);
        $response->assertRedirect('/chatter');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_wrong_credentials()
    {
        $response = $this->post('/login', [
            'name' => 'no_user',
            'password' => 'wrong_password',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
