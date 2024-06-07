<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserDetailSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testUserExist()
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->where('username', 'hasanhusain')->first();
        self::assertNotNull($user);
        self::assertEquals("hasanhusain", $user->name);
    }

    public function testOneToOneUser()
    {
        $this->seed([UserSeeder::class, UserDetailSeeder::class]);

        $user = User::query()->where('username', 'hasanhusain')->first();
        self::assertNotNull($user);
        self::assertEquals("hasanhusain", $user->name);

        $userDetails = $user->user_detail->first();
        self::assertEquals("UI UX", $userDetails->title);
    }
}
