<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\UserDetailSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testProductTable()
    {
        $this->seed([UserSeeder::class, UserDetailSeeder::class, CategorySeeder::class, ProductSeeder::class, ReviewSeeder::class]);

        $product = Product::query()->first();

        self::assertNotNull($product);

        $reviews = $product->reviews;
        self::assertNotNull($reviews);
        var_dump($reviews);

    }
}
