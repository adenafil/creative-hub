<?php

namespace App\services\impl;

use App\Helper\PaginationHelper;
use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\UserPayment;
use App\services\HomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Nonstandard\Uuid;

class HomeServiceImpl implements HomeService
{
    function getDataProductOnIndex(int $length, Request $request): array
    {
        $category = $request->query('category');
        $search = $request->query('search');
        // Tentukan jumlah item per halaman
        $perPage = 8;

        // Ambil halaman saat ini dari query string, defaultnya 1
        $currentPage = $request->input('page', 1);

        // Hitung offset
        $offset = ($currentPage - 1) * $perPage;

        if ($category != null) {
            $totalProducts = Product::query()->where('category_id', $category)->count();
            $products = Product::query()->where('category_id', $category)->latest()->paginate($length);
//            $category_name = ucwords(Category::query('id', $category)->first()->name);
//            $category_product = $category_name  . " Categories";
//            dd($category_name);
        } elseif ($search != null) {
            $totalProducts = Product::query()->where('title','like',  "%{$search}%")->count();
            $products = Product::query()->where('title', 'like',  "%{$search}%")->latest()->paginate($length);
        }
        else {
            // Hitung total produk
            $totalProducts = Product::count();

            $products = Product::query()->latest()->paginate($length);
//            $category_product = "All Products";

        }

        // Hitung jumlah halaman
        $totalPages = ceil($totalProducts / $perPage);

        // Hitung item yang sedang ditampilkan
        $firstItem = $offset + 1;
        $lastItem = min($offset + $perPage, $totalProducts);

        // Buat elemen pagination seperti yang ada di metode elements()
        $window =  PaginationHelper::paginationWindow($currentPage, $totalPages);


//        dd($products[0]->user->user_detail);
        $reviews = Review::query()->inRandomOrder()->limit($length - 3)->get();

        $category = request()->query('category');
        $category_data = \App\Models\Category::query()->where('id', $category)->first();
        $category_name = ucwords($category_data->name ?? null);

        if (request()->query('search') != null) {
            if ($totalProducts == 0) {
                $category_name = "Product Not Found";
            } else {
                $category_name = "Searching For " . request()->query('search');
            }
        }


        return compact('products', 'reviews', 'category_name', 'totalProducts', 'perPage', 'currentPage', 'totalPages', 'window', 'firstItem', 'lastItem');
    }

    function getDataDetailProduct(int $id): array
    {
        $product = Product::query()->where('id', $id)->first();
        $reviews = Review::query()->where('product_id', $id)->get();
        $products = Product::query()->inRandomOrder()->limit(4)->get();
        $totalProduct = Product::query()->where('seller_id', $product->seller_id)->count();

        return compact('product', 'reviews', 'products', 'totalProduct');
    }

    function checkout($data, $id)
    {
        DB::beginTransaction();

        # check transaction already exist or not
        $user_transaction = Transaction::query()->where('user_id', auth()->user()->id)
            ->where('transactions.user_id', '=', auth()->user()->id)
            ->where('purchases.product_id', '=', $id)
            ->join('purchases', 'purchases.transaction_id', '=', 'transactions.id')
            ->select('purchases.*', 'transactions.*')
            ->get();



        $userPayment = new UserPayment();

        $product = Product::query()->where('id', $id)->first();
        $paymentMethod = PaymentMethod::query()
            ->where('user_id', $product->seller_id)
            ->where('payment_account_number', $data['number'])
            ->where('payment_account_recipient_name', $data['name'])
            ->first();

        if ($data['proof'] != null && is_null($user_transaction->first())) {
            $proofFile = $data['proof'];

            $proofName = Uuid::uuid5(Uuid::NAMESPACE_DNS, time() . "proof_") . '.' . $proofFile->getClientOriginalExtension();

            $proofFile->storeAs("/products/proof_payment/" . auth()->user()->id, $proofName , 'local');
            $userPayment->payment_proof_url = auth()->user()->id . "/" . $proofName;
            $userPayment->user_id = auth()->user()->id;
            $userPayment->payment_method_id = $paymentMethod->id;
            $userPayment->status = 'pending';
            $userPayment->reason = '';
            $userPayment->save();
            if (isset($data['serial_no_transactions'])) {
                $transaction = $userPayment->transactions()->create([
                    'user_id' => auth()->user()->id,
                    'user_payment_id' => $userPayment->id,
                    'serial_no_transactions' => $data['serial_no_transactions'],
                ]);
            } else {
                $transaction = $userPayment->transactions()->create([
                    'user_id' => auth()->user()->id,
                    'user_payment_id' => $userPayment->id,
                    'serial_no_transactions' => Uuid::uuid5(Uuid::NAMESPACE_DNS, time())->toString()
                ]);
            }
            $transaction->buyProducts()->attach($id);

            if ($user_transaction->count() != 0) {
                DB::rollBack();
                return false;
            }

            DB::commit();
            return true;

        }
        return false;
    }
}
