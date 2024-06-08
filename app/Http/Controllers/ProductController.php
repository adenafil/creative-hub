<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        return $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getProductByUser(Auth::id());
        return view('admin.products.index', compact('products'));
    }

    public function deleteProduct()
    {

    }


    public function create()
    {
        return \response()->view('admin.products.create');
    }


    public function destroy($id): RedirectResponse
    {

        $product = Product::query()->where('id', $id)->first();
        $reviews = $product->reviews;
        foreach ($reviews as $review) {
            $review->delete();
        }
        $product->delete();


        return redirect()->route('product.index')->with('success', 'Product have been deleted');
    }


    public function doCreate(AddProductRequest $request): Response
    {
        $data = $request->only(['name', 'price', 'about', 'category', 'cover', 'file']);
        $result = $this->productService->addProduct($data);

        $products = $this->productService->getProductByUser(Auth::id());
        return \response()->view('admin.products.index', compact('products'));
    }
    public function download(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
//        return \response()->download(storage_path('/app/product/assets/' . "namanya"));
        return BinaryFileResponse::HTTP_OK;
    }

    public function edit($id): Response
    {
        $product = Product::query()->where("id", $id)->get(); // Mengambil data produk berdasarkan ID
//        dd($product[0]);
        return \response()->view('admin.products.edit', ["product" => $product[0]]);
    }

    public function doEdit(UpdateProductRequest $request, $id): Response
    {
        $data = $request->only(['name', 'price', 'about', 'category', 'cover', 'file']);
        $result = $this->productService->updateProduct($data, $id);

        $products = $this->productService->getProductByUser(Auth::id());
        return \response()->view('admin.products.index', compact('products'));
    }

}
