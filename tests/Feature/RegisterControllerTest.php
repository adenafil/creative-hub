<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    public function testRegister()
    {
        $this->post('/register', [
            'name' => 'hasanhusain',
            'username' => 'hasanhusain',
            'email' => 'hasanhusain@gmail.com',
            'password' => 'hasanhusain',
            'password_confirmation' => 'hasanhusain'
        ])->assertRedirect('/home');
    }
}
