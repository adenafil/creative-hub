<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testAddUsers()
    {
        $user = new User();
        $user->username = 'ali';
        $result = $user->save();

        self::assertTrue($result);
    }
}
