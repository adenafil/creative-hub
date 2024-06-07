<?php

namespace App\services\impl;

use App\Models\Product;
use App\Models\Review;
use App\services\ProductService;

class ProductServiceImpl implements ProductService
{

    function getDataHome(int $length)
    {
        $dataProducts = [];
        $products = Product::query()->latest()->limit($length)->get();

        foreach ($products as $product) {
            $dataProducts[] = [
                "id" =>$product->id,
                "title" => $product->title,
                "category_name" => $product->category->name,
                "seller_name" => $product->user->username,
                "url_photo_product" => $product->image_product_url,
                "url_photo_seller" => $product->user->user_detail->image_url,
                "price" => $product->price,
            ];
        }

        $reviews = Review::query()->latest()->limit($length - 3)->get();
        $dataComments = [];
        foreach ($reviews as $review) {
            $dataComments[] = [
                "id" => $review->id,
                "name" => $review->user->name,
                "title" => $review->user->user_detail->title,
                "image_url" => $review->user->user_detail->image_url,
                "star" => $review->star,
                "comment" => $review->comments,
            ];
        }


        return [
            "newProducts" => $dataProducts,
            "reviews" => $dataComments,
        ];
    }
}
