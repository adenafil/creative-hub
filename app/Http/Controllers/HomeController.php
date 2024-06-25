<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPayment;
use App\services\HomeService;
use App\services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Nonstandard\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    protected HomeService $homeService;

    public function __construct(ProductService $productService, HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index(Request $request): Response
    {
        $dataHome = $this->homeService->getDataProductOnIndex( 8, $request);

        $category_product = "New Products";
        return \response()->view('home.index', $dataHome, 200);
    }

    public function templates(Request $request): Response
    {
        $dataHome = $this->homeService->getDataProductOnIndex( 8);
        return \response()->view('home.templates', $dataHome, 200);
    }


    public function products($id)
    {
        $data = $this->homeService->getDataDetailProduct($id);
        return \response()->view('home.product_details', $data);
    }

    public function checkout($id)
    {
        $product = Product::query()->where('id', $id)->first();
        return \response()->view('home.checkout', compact('product'));
    }

    public function doCheckout(CheckoutRequest $request, $id)
    {
        $data = $request->only(['bank', 'name', 'number', 'proof']);

        if ($request->hasFile('proof')) {
            $this->homeService->checkout($data, $id);
            return \response()->view('home.success-checkout', [$id]);
        }

        return redirect()->back()->withErrors('proof');
    }

    public function successCheckout($id)
    {
        return \response()->view('home.success-checkout', [$id]);
    }

    public function addToCart(Request $request, $id)
    {
        // Ambil data dari request
        $data = $request->all();
        toast('Berhasil Menmabah Product Ke Keranjang', 'success');
        $cartUser = auth()->user()->addProductIntoCart()->attach($id);
        return \redirect()->back();
    }

    public function cart(Request $request)
    {
        $data = [
            2 => 2.,
            161 => 161,
            146 => 146,
            288 => 288,
            1070 => 1070,
            1071 => 1071,
            1072 => 1072,
            1073 => 1073,
        ];

        $carts = auth()->user()->addProductIntoCart->groupBy('seller_id');;

        return \response()->view('home.cart', compact('carts', 'data'));
    }

    public function doCart(Request $request)
    {
        dd($request);
    }
}
