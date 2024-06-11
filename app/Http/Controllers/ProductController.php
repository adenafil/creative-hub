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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        return $this->productService = $productService;
    }

    public function index(Request $request)
    {
        Session::put('product_index_page', $request->input('page', 1));

        $products = $this->productService->getProductByUser(Auth::id());
        return view('admin.products.index', compact('products'));
    }

    public function create(Request $request)
    {
        Session::get('product_index_page');

        $categories = Category::pluck('name', 'id'); // Assuming 'name' is the column for category names
        return view('admin.products.create', compact('categories'));
    }


    public function destroy(Request $request, $id): RedirectResponse
    {

        $validateData = $this->productService->deleteProduct($id, $request);

        // If the current page is empty after deletion, redirect to page 1
        if ($validateData['isProductOnPageEmpty'] && $validateData['currentPage'] > 1) {
            return redirect()->route('product.index', ['page' => 1])->with('success', 'Product has been deleted');
        }

        return redirect()->route('product.index', ['page' => $validateData['currentPage']])->with('success', 'Product has been deleted');
    }


    public function doCreate(AddProductRequest $request): Response | RedirectResponse
    {
        $data = $request->only(['name', 'price', 'about', 'category_id', 'cover', 'path_file']);

        $result = $this->productService->addProduct($data);

        if ($result) {
            $products = $this->productService->getProductByUser(Auth::id());
        }

        return redirect()->route('product.index', ['page' => Session::get('product_index_page')])->with('success', 'Product has been created');
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
        $categories = Category::pluck('name', 'id'); // Assuming 'name' is the column for category names
        return \response()->view('admin.products.edit', ["product" => $product[0], 'categories' => $categories]);
    }

    public function doEdit(UpdateProductRequest $request, $id): RedirectResponse
    {
        $data = $request->only(['name', 'price', 'about', 'category_id', 'cover', 'path_file']);
        $result = $this->productService->updateProduct($data, $id);

//        $products = $this->productService->getProductByUser(Auth::id());
        return \redirect()->route('product.index', ['page' => Session::get('product_index_page')]);
    }


}
