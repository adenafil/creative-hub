<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function testLogin()
    {
        $this->seed([UserSeeder::class]);

        $this->post('/login', [
            'username' => 'hasanhusain',
            'password' => 'hasanhusain',
        ])->assertRedirect('/home');
    }
}
