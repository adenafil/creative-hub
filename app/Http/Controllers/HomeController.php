<?php

namespace App\Http\Controllers;

use App\Models\Product;
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

    public function index(): Response
    {
        $dataHome = $this->productService->getDataHome( 8);
        return \response()->view('home.index', compact('dataHome'), 200);
    }
}
