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
        $carts = auth()->user()->addProductIntoCart->groupBy('seller_id');;
        return \response()->view('home.cart', compact('carts'));
    }

    public function doCart(Request $request)
    {
        $totalProofs = null;
        $sellerIds = $request['default-checkbox'] ? Product::whereIn('id', $request['default-checkbox'])
            ->groupBy('seller_id')
            ->pluck('seller_id')
            ->count() : null
        ;
        if ($request['proof'] != null) {
            $totalProofs = count($request['proof']);
        }

        if ($totalProofs == null && $sellerIds == null) {
            toast('Anda Belum Mencheck Satupun Produk Dan Belum Upload Bukti Pembayaran', 'error');
            return redirect()->back();
        }

        if ($totalProofs != $sellerIds) {
            toast("Anda Belum Mengupload " . $sellerIds - $totalProofs . " Bukti Pembayaran", 'error');
            return redirect()->back();
        }

//        dd($request->all());

        //$data = $request->only(['bank', 'name', 'number', 'proof']);
        $payments = array();
        $proof_index = array_key_first($request['proof']);
        for ($i = 0; $i < count($request['default-checkbox']); $i++) {
            for ($j = 0; $j < count($request['default-checkbox']); $j++) {
                $tempSellerId = Product::query()->where('id', $request['default-checkbox'][$i])->first()->seller_id;
                $tempBank = PaymentMethod::query()->where('user_id', $tempSellerId)
                    ->where('payment_account_recipient_name', $request['name'][$j])
                    ->where('payment_account_name', $request['bank'][$j])
                    ->where('payment_account_number', $request['number'][$j])
                    ->first();

                if ($tempBank != null)  {

                    $cek = true;
                    foreach ($payments as $payment) {
                        if ($payment['name'] == $tempBank->payment_account_recipient_name && $payment['bank'] == $tempBank->payment_account_name && $payment['number'] == $tempBank->payment_account_number) {
                            $cek = false;
                        }
                    }

                    if ($cek) {
                        $payments[] = [
                            'bank' => $tempBank->payment_account_name,
                            'name' => $tempBank->payment_account_recipient_name,
                            'number' => $tempBank->payment_account_number,
                            'proof' => $request['proof'][$proof_index],
                            'seller_id' => $tempSellerId
                        ];
                    }
                }

            }

        }

        for ($i = 0; $i < count($request['default-checkbox']); $i++) {
            // cek apakah seller_id proofnya ada
            foreach ($payments as $payment) {
                if ($payment['seller_id'] == Product::query()->where('id', $request['default-checkbox'][$i])->first()->seller_id) {
                    $this->homeService->checkout($payment, $request['default-checkbox'][$i]);
                }
            }
        }

        toast("Anda Sukses Melakukan Checkout", 'success');

        return redirect()->back();
    }
}
