<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
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
        $dataHome = $this->homeService->getDataProductOnIndex( 8);
        return \response()->view('home.index', $dataHome, 200);
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
          0,
            1,
            2
        ];

        return \response()->view('home.cart', compact('data'));
    }

    public function doCart(Request $request)
    {
        dd($request);
    }

    public function hi(Request $request)
    {
        return \response()->json(['success' => 'masuk pak eko', 'data' => $request->input('id-product')]);
    }
}
