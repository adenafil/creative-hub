<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->where("name", "ali")->first();
        $product = Product::query()->first();
        $review = new Review();
        $review->star = 5;
        $review->comments = "Fontya bagus san";
        $review->user_id = $user->id;
        $review->product_id = $product->id;
        $review->save();
    }
}
