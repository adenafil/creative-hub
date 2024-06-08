<?php

namespace App\services\impl;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\services\ProductService;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    function addProduct($data)
    {
        // Generate unique names for files
        $coverName = 'cover_' . time() . '.' . $data['cover']->getClientOriginalExtension();
        $assetName = 'asset_' . time() . '.' . $data['file']->getClientOriginalExtension();

        // Store files with custom names
        $cover = $data['cover']->storeAs("/product/pictures/" . Auth::user()->id , $coverName, 'local');
        $asset = $data['file']->storeAs('/product/assets/' . Auth::user()->id, $assetName, 'local');

        if (!$data['file']->getClientOriginalExtension() == 'zip') {
            return false;
        }

        $product = new Product();
        $product->title = $data['name'];
        $product->price = $data['price'];
        $product->description = $data['about'];
        $product->category_id = Category::query()->where('name', $data['category'])->first()->id;
        $product->image_product_url = Auth::user()->id . "/" . $coverName;
        $product->asset_product_url = Auth::user()->id . "/" . $assetName;
        $product->seller_id = Auth::user()->id;
        $product->save();

        return true;

//        return $assetName;

//        return [
//            'name' => $data['name'],
//            'price' => $data['price'],
//            'about' => $data['about'],
//            'category' => $data['category'],
//            'image_path' => $coverName,
//            'archive_path' => $assetName,
//        ];
    }

    public function downloadProduct()
    {

    }

//    public function getProductByUser(int $userId): CursorPaginator
//    {
////        $products = Product::query()->where("seller_id", $userId)->orderBy('id')->cursorPaginate(5);
////        return $products;
////          return Product::query()->where('seller_id', $userId)->orderBy('id')->cursorPaginate(5, [*]), 'cursor', );
//    }

//    public function nextProductByUserCursorPaginator($products)
//    {
//        return $products->nextCursor();
//    }

    function getProductByUser(int $userId)
    {
        // TODO: Implement getProductByUser() method.
        return Product::query()->where('seller_id', $userId)->orderBy('created_at', 'desc')->simplePaginate(2);
    }

    public function updateProduct(array $data, $id): bool
    {

        // Menentukan nama file
//        $coverName = 'cover_' . time() . '.' . $data['cover']->getClientOriginalExtension();
//        $assetName = 'asset_' . time() . '.' . $data['file']->getClientOriginalExtension();

        // Menyimpan file dengan nama khusus
//        $cover = $data['cover']->storeAs("/product/pictures/" . Auth::user()->id, $coverName, 'local');
//        $asset = $data['file']->storeAs('/product/assets/' . Auth::user()->id, $assetName, 'local');

        // Mengambil produk yang ada
        $product = Product::query()->where('id', $id)->first();

        // Memperbarui data produk
        $product->title = $data['name'];
        $product->price = $data['price'];
        $product->description = $data['about'];
        $product->category_id = Category::query()->where('name', $data['category'])->first()->id;
//        $product->image_product_url = Auth::user()->id . "/" . $coverName;
//        $product->asset_product_url = Auth::user()->id . "/" . $assetName;
        $product->seller_id = Auth::user()->id;
        $product->save();

        return true;
    }
}
