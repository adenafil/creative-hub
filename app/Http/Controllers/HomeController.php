<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\UserPayment;
use App\services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Nonstandard\Uuid;

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

    public function doCheckout(CheckoutRequest $request, $id)
    {
        $data = $request->only(['bank', 'name', 'number', 'proof']);


        # check transaction already exist or not
        $user_transaction = Transaction::query()->where('user_id', auth()->user()->id)
            ->where('transactions.user_id', '=', auth()->user()->id)
            ->where('purchases.product_id', '=', $id)
            ->join('purchases', 'purchases.transaction_id', '=', 'transactions.id')
            ->select('purchases.*', 'transactions.*')
            ->get();
        ;

        DB::beginTransaction();


        $userPayment = new UserPayment();

        $product = Product::query()->where('id', $id)->first();
        $paymentMethod = PaymentMethod::query()
            ->where('user_id', $product->seller_id)
            ->where('payment_account_number', $data['number'])
            ->where('payment_account_recipient_name', $data['name'])
            ->first();


        if ($request->hasFile('proof')) {
            $proofFile = $data['proof'];

            $proofName = Uuid::uuid5(Uuid::NAMESPACE_DNS, time() . "proof_") . '.' . $proofFile->getClientOriginalExtension();

            $proofFile->storeAs("/products/proof_payment/" . auth()->user()->id, $proofName , 'local');
            $userPayment->payment_proof_url = auth()->user()->id . "/" . $proofName;
            $userPayment->user_id = auth()->user()->id;
            $userPayment->payment_method_id = $paymentMethod->id;
            $userPayment->status = 'pending';
            $userPayment->reason = '';
            $userPayment->save();

            $transaction = $userPayment->transactions()->create([
                'user_id' => auth()->user()->id,
                'user_payment_id' => $userPayment->id,
            ]);
            $transaction->buyProducts()->attach($id);

            if ($user_transaction->count() != 0) DB::rollBack();

            DB::commit();

            return \response()->view('home.success-checkout', [$id]);

        }

        return redirect()->back()->withErrors('proof');
    }

    public function successCheckout($id)
    {
        return \response()->view('home.success-checkout', [$id]);
    }
}
