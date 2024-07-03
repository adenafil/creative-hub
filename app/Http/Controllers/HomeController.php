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
use Illuminate\Support\Facades\Log;
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

        if ($product->seller_id == auth()->user()->id) {
            return redirect()->route('home.product.detail', ['id' => $id]);
        }

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
        toast('Berhasil Menambah Product Ke Keranjang', 'success');
        $cartUser = auth()->user()->addProductIntoCart()->attach($id);
        return \redirect()->back();
    }

    public function cart(Request $request)
    {
        $carts = auth()->user()->addProductIntoCart->groupBy('seller_id');;
        return \response()->view('home.cart', compact('carts'));
    }

    public function deleteOneCart($id)
    {
//        $seller_id = auth()->user()->addProductIntoCart->detach;
        $data = auth()->user()->addProductIntoCart()->detach($id);
        return response()->json(['success' =>   $data == true ]);
    }

    public function doCart(Request $request)
    {
        $serial_no_transaction = Uuid::uuid5(Uuid::NAMESPACE_DNS, time())->toString();
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
            $tempSellerId = Product::query()->where('id', $request['default-checkbox'][$i])->first()->seller_id;

            for ($k = 0; $k < count($request['number']); $k++) {
                $tempBank = PaymentMethod::query()->where('user_id', $tempSellerId)
                    ->where('payment_account_recipient_name', $request['name'][$k])
                    ->where('payment_account_name', $request['bank'][$k])
                    ->where('payment_account_number', $request['number'][$k])
                    ->first();

                if ($tempBank != null) {
                    $exists = false;

                    foreach ($payments as $payment) {
                        if ($payment['name'] == $tempBank->payment_account_recipient_name &&
                            $payment['bank'] == $tempBank->payment_account_name &&
                            $payment['number'] == $tempBank->payment_account_number) {
                            $exists = true;
                            break;
                        }
                    }

                    if (!$exists) {
                        $payments[] = [
                            'bank' => $tempBank->payment_account_name,
                            'name' => $tempBank->payment_account_recipient_name,
                            'number' => $tempBank->payment_account_number,
                            'proof' => $request['proof'][$proof_index],
                            'seller_id' => $tempSellerId,
                            'serial_no_transactions' => $serial_no_transaction
                        ];
                    }
                }
            }
        }

        Log::debug("payments : " . json_encode($payments));
        for ($i = 0; $i < count($request['default-checkbox']); $i++) {
            // cek apakah seller_id proofnya ada
            foreach ($payments as $payment) {
                Log::debug("Checkout to the cart " . $payment['seller_id'] . "with index " . $i);
                Log::debug("logic " . $payment['seller_id'] . "==" . Product::query()->where('id', $request['default-checkbox'][$i])->first()->seller_id);
                if ($payment['seller_id'] == Product::query()->where('id', $request['default-checkbox'][$i])->first()->seller_id) {
                    Log::debug("Checkout to the cart " . $payment['seller_id']);
                    $this->homeService->checkout($payment, $request['default-checkbox'][$i]);
                    auth()->user()->addProductIntoCart()->detach($request['default-checkbox'][$i]);
                }
            }
        }

        toast("Anda Sukses Melakukan Checkout", 'success');

        return redirect()->back();
    }
}
