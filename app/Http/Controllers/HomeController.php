<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request): Response
    {
        $dataHome = $this->productService->getDataHome( 8);
        return \response()->view('home.index', compact('dataHome'), 200);
    }

    public function products($id)
    {
        $data = $this->productService->getProductDataOnHome($id);
        return \response()->view('home.product_details', $data);
    }

    public function checkout($id)
    {
        $product = Product::query()->where('id', $id)->first();
        return \response()->view('home.checkout', [
            'product' => $product
        ]);
    }

    public function successCheckout($id)
    {
        return \response()->view('home.success-checkout', [$id]);
    }
}
