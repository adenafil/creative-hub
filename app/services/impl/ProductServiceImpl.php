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
use Ramsey\Uuid\Nonstandard\Uuid;

class ProductServiceImpl implements ProductService
{
    function getDataHome(int $length)
    {
        $products = Product::query()->latest()->limit($length)->get();

        $reviews = Review::query()->latest()->limit($length - 3)->get();
        return [
            "newProducts" => $products,
            "reviews" => $reviews,
        ];
    }

    function addProduct($data)
    {
        // Generate unique names for files

        $coverName =  Uuid::uuid5(Uuid::NAMESPACE_DNS, time() . "cover_") . $data['cover']->getClientOriginalExtension();
        $assetName = Uuid::uuid5(Uuid::NAMESPACE_DNS, time() . "asset_") . '.' . $data['path_file']->getClientOriginalExtension();

        // Store files with custom names
        $cover = $data['cover']->storeAs("/product/pictures/" . Auth::user()->id , $coverName, 'local');
        $asset = $data['path_file']->storeAs('/product/assets/' . Auth::user()->id, $assetName, 'local');

        if (!$data['path_file']->getClientOriginalExtension() == 'zip') {
            return false;
        }

        $product = new Product();
        $product->title = $data['name'];
        $product->price = $data['price'];
        $product->description = $data['about'];
        $product->category_id = Category::query()->where('name', $data['category_id'])->first()->id;
        $product->image_product_url = Auth::user()->id . "/" . $coverName;
        $product->asset_product_url = Auth::user()->id . "/" . $assetName;
        $product->seller_id = Auth::user()->id;
        $product->save();

        return true;

    }

    public function downloadProduct()
    {

    }

    function getProductByUser(int $userId)
    {
        // TODO: Implement getProductByUser() method.
        return Product::where('seller_id', $userId)->paginate(4);
    }

    public function updateProduct(array $data, $id): bool
    {
        // Mengambil produk yang ada
        $product = Product::query()->where('id', $id)->first();

        // Memperbarui data produk
        $product->title = $data['name'];
        $product->price = $data['price'];
        $product->description = $data['about'];
        $product->category_id = Category::query()->where('name', $data['category_id'])->first()->id;
        $product->seller_id = Auth::user()->id;


        if (isset($data['cover'])) {
            $coverName =  Uuid::uuid5(Uuid::NAMESPACE_DNS, time() . "cover_") . $data['cover']->getClientOriginalExtension();
            $product->image_product_url = Auth::user()->id . "/" . $coverName;

            // Store files with custom names
            $cover = $data['cover']->storeAs("/product/pictures/" . Auth::user()->id , $coverName, 'local');
        }
        if (isset($data['path_file'])) {
            $assetName = Uuid::uuid5(Uuid::NAMESPACE_DNS, time() . "asset_") . '.' . $data['path_file']->getClientOriginalExtension();
            $asset = $data['path_file']->storeAs('/product/assets/' . Auth::user()->id, $assetName, 'local');
            $product->asset_product_url = Auth::user()->id . "/" . $assetName;

            if (!$data['path_file']->getClientOriginalExtension() == 'zip') {
                return false;
            }
        }
        $product->save();

        return true;
    }

    function deleteProduct(string $idProduct, $dataRequest)
    {
        $product = Product::query()->where('id', $idProduct)->first();
        $reviews = $product->reviews;
        foreach ($reviews as $review) {
            $review->delete();
        }
        $product->delete();

        $currentPage = $dataRequest->get('page', 1); // Default to page 1 if not provided

        // Check if there are products left on the current page
        $productsOnPage = Product::where('seller_id', Auth::id())->paginate(4, ['*'], 'page', $currentPage);

        return [
            'currentPage' => $currentPage,
            'isProductOnPageEmpty' => $productsOnPage->isEmpty()
        ];
    }

    function getProductDataOnHome(int $id) : array{
        $product = Product::query()->where('id', $id)->first();
        $reviews = Review::query()->where('product_id', $id)->get();
        $products = Product::query()->limit(4)->get();

        return [
            "product" => $product,
            "products" => $products,
            "reviews" => $reviews,
        ];
    }
}
