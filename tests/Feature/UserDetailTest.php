<?php

namespace Tests\Feature;

use App\Models\UserDetail;
use Database\Seeders\UserDetailSeeder;
use Database\Seeders\UserSeeder;
use http\Client\Curl\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserDetailTest extends TestCase
{
    public function testUserDetailsExist()
    {
        $this->seed([UserSeeder::class, UserDetailSeeder::class]);

        $userDetail = UserDetail::query()->first();
        self::assertNotNull($userDetail);
        self::assertEquals("www.google.com/hasanhusain", $userDetail->image_url);

    }

    public function testOneToOneUserDetails()
    {
        $this->seed([UserSeeder::class, UserDetailSeeder::class]);

        $userDetail = UserDetail::query()->first();
        self::assertNotNull($userDetail);
        self::assertEquals("hasanhusain", $userDetail->user->username);
    }

    public function testUser()
    {
        $this->seed([UserSeeder::class, UserDetailSeeder::class]);

        $user = \App\Models\User::class::first();
        self::assertNotNull($user->user_detail);
    }
}
