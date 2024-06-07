<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::query()->where("name", "font")->first();
        $user = User::query()->where("name", "hasanhusain")->first();

        $product = new Product();
        $product->title = "Font Hasan Husain";
        $product->image_product_url = "https://public-files.gumroad.com/qw1iisc2muqboq12agu5s2nd2v4j";
        $product->seller_id = $user->id;
        $product->description = "<h1>Font Hasan Husain</h1>";
        $product->asset_product_url = "www.product-ui-ux.com/asset-font-hasan-husain";
        $product->price = 1_000_000;
        $product->category_id = $category->id;
        $product->save();

        $this->generateProductOfHasan(7);

    }

    public function generateProductOfHasan(int $length): void
    {
        $category = Category::query()->where("name", "font")->first();
        $user = User::query()->where("name", "hasanhusain")->first();

        for ($i = 0; $i < $length; $i++) {
            $product = new Product();
            $product->title = "Font Hasan Husain $i";
            $product->image_product_url = "https://public-files.gumroad.com/qw1iisc2muqboq12agu5s2nd2v4j";
            $product->seller_id = $user->id;
            $product->description = "<h1>Font Hasan Husain</h1>";
            $product->asset_product_url = "www.product-ui-ux.com/asset-font-hasan-husain";
            $product->price = 1_000_000;
            $product->category_id = $category->id;
            $product->save();
        }
    }
}
