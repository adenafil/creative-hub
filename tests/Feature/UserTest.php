<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ReviewSeeder;
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

    public function testOneToManyProducts()
    {
        $this->seed([UserSeeder::class, UserDetailSeeder::class, CategorySeeder::class, ProductSeeder::class, ReviewSeeder::class]);
        $user = User::query()->where('username', 'hasanhusain')->first();
        $products = $user->products;

        self::assertNotNull($products);
        self::assertEquals("Font Hasan Husain", $products[0]->title);

        $category = $products[0]->category;
        self::assertNotNull($category);
        self::assertEquals("font", $category->name);

        $reviews = $user->reviews;
        var_dump($reviews);
    }
}
