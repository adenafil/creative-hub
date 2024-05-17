<?php

namespace Tests\Feature;

use App\Models\UserDetail;
use Database\Seeders\ImageSeeder;
use Database\Seeders\UserDetailSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserDetailTest extends TestCase
{
    public function testOneToOne()
    {
        $this->seed([UserSeeder::class, ImageSeeder::class, UserDetailSeeder::class]);

        $user_detail = UserDetail::first();
        self::assertEquals('ali', $user_detail->name);

        $user = $user_detail->user;
        self::assertEquals('ali', $user->username);

        $image = $user_detail->image;
        self::assertEquals('www.google.com/ali.png', $image->location);

        $password = decrypt($user_detail->password);
        self::assertEquals('aliali123', $password);

    }
}
