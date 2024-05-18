<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class SeasonTest extends TestCase
{
    public function testLoginSeasonAndLogout()
    {
        $this->seed([UserSeeder::class]);

        $this->post('/login', [
            'username' => 'hasanhusain',
            'password' => 'hasanhusain'
        ])->assertRedirect('/home');

        self::assertTrue(Session::exists('username'));

        $this->post('/logout');

        self::assertFalse(Session::exists('username'));
    }

    public function testRegisterSeasonAndLogout()
    {
        $this->post('/register', [
            'name' => 'hasanhusain',
            'username' => 'hasanhusain',
            'password' => 'hasanhusain',
            'password_confirmation' => 'hasanhusain',
            'email' => 'hasanhusain@gmail.com',
        ])->assertRedirect('/home');

        self::assertTrue(Session::exists('username'));

        $this->post('/logout');

        self::assertFalse(Session::exists('username'));

    }


}
