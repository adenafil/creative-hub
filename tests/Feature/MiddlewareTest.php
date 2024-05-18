<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    public function testGuestMiddleware()
    {
        $this->get('/home')
            ->assertRedirect('/');
    }

    public function testLoginMiddlewareAndLogout()
    {
        $this->seed([UserSeeder::class]);

        $this->post('/login', [
            'username' => 'hasanhusain',
            'password' => 'hasanhusain'
        ])->assertRedirect('/home');

        $this->get('/login')
            ->assertRedirect('/home');

        $this->get('/register')
            ->assertRedirect('/home');

        $this->post('/logout')
            ->assertRedirect('/');

        $this->get('/home')
            ->assertRedirect('/');

    }

    public function testRegisterMiddlewareAndLogout()
    {
        $this->post('/register', [
            'name' => 'hasanhusain',
            'username' => 'hasanhusain',
            'password' => 'hasanhusain',
            'password_confirmation' => 'hasanhusain',
            'email' => 'hasanhusain@gmail.com',
        ])->assertRedirect('/home');

        $this->get('/login')
            ->assertRedirect('/home');

        $this->get('/register')
            ->assertRedirect('/home');

        $this->post('/logout')
            ->assertRedirect('/');

        $this->get('/home')
            ->assertRedirect('/');

    }
}
