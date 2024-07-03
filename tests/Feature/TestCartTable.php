<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Product;
use Database\Seeders\CartSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PaymentMethodSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\UserDetailSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestCartTable extends TestCase
{
    public function testManyToManyCart()
    {
        $this->seed([
            UserSeeder::class,
            UserDetailSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            PaymentMethodSeeder::class,
            CartSeeder::class
        ]);

        $product = Product::query()->first();
        self::assertNotNull($product);


        $cartUser = Cart::query()->first();
        $cartUser->addProductIntoCart()->attach($product->id);

        self::assertNotNull($cartUser);

        $jembatan = $product->productAddedIntoCart;
        var_dump($jembatan[0]->product_id);
        self::assertNotNull($jembatan);
    }
}
