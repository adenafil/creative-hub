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
        $product->image_product_url = "www.product-ui-ux.com/photo-font-hasan-husain";
        $product->seller_id = $user->id;
        $product->description = "<h1>Font Hasan Husain</h1>";
        $product->asset_product_url = "www.product-ui-ux.com/asset-font-hasan-husain";
        $product->price = 1_000_000;
        $product->category_id = $category->id;
        $product->save();
    }
}
