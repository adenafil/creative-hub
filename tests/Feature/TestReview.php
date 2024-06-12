<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Review;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\UserDetailSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestReview extends TestCase
{
    public function testTableReviews()
    {
        $this->seed([UserSeeder::class, UserDetailSeeder::class, CategorySeeder::class, ProductSeeder::class, ReviewSeeder::class]);

        $review = Review::query()->first();
        self::assertNotNull($review);
        self::assertEquals("Fontya bagus san", $review->comments);

        $product = $review->product;
        self::assertNotNull($product);
        self::assertEquals("Font Hasan Husain", $product->title);

        $seller = $product->user;
        self::assertNotNull($seller);
        self::assertEquals("hasanhusain", $seller->name);

        $user = $review->user;
        self::assertNotNull($user);
        self::assertEquals("ali", $user->name);
    }
}
