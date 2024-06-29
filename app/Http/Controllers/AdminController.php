<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(): Response
    {
        $total_product = Product::query()->where('seller_id', auth()->user()->id)->count();
        $total_order = Purchase::join('products as pr', 'purchases.product_id', '=', 'pr.id')
            ->join('transactions as t', 'purchases.transaction_id', '=', 't.id')
            ->join('user_payments as up', 't.user_payment_id', '=', 'up.id')
            ->where('pr.seller_id', auth()->user()->id)
            ->where('up.status', 'PAID')
            ->count();
        $total_revenue = Purchase::join('products as pr', 'purchases.product_id', '=', 'pr.id')
            ->join('transactions as t', 'purchases.transaction_id', '=', 't.id')
            ->join('user_payments as up', 't.user_payment_id', '=', 'up.id')
            ->where('pr.seller_id', auth()->user()->id)
            ->where('up.status', 'PAID')
            ->sum('pr.price');
        $total_customer = Purchase::join('products as pr', 'purchases.product_id', '=', 'pr.id')
            ->join('transactions as t', 'purchases.transaction_id', '=', 't.id')
            ->join('user_payments as up', 't.user_payment_id', '=', 'up.id')
            ->where('pr.seller_id', auth()->user()->id)
            ->where('up.status', 'PAID')
            ->select(DB::raw('count(distinct up.user_id) as total_customers'))
            ->first()->total_customers;
        $top_products = Product::withTrashed()
            ->select('products.id', 'products.image_product_url', 'products.title', 'products.price', DB::raw('COUNT(*) as total_transactions'))
            ->join('purchases', 'products.id', '=', 'purchases.product_id')
            ->where('products.seller_id', auth()->user()->id)
            ->groupBy('products.id', 'products.title', 'products.image_product_url', 'products.price')
            ->orderByDesc('total_transactions')
            ->limit(5)
            ->get();



        return \response()->view('admin.dashboard', compact('total_product', 'total_order', 'total_revenue', 'total_customer', 'top_products'));
    }


}
