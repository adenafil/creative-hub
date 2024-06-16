<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApproveOrDisapproveRequest;
use App\Models\Product;
use App\Models\Review;
use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductOrderController extends Controller
{
    public function index(Request $request): Response
    {

        if ($request->query('simple-search')) {
            $search = $request->query('simple-search');
            $data = UserPayment::query()
                ->join('transactions', 'transactions.user_payment_id', '=', 'user_payments.id')
                ->join('purchases', 'purchases.transaction_id', '=', 'transactions.id')
                ->join('products', 'products.id', '=', 'purchases.product_id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('products.seller_id', '=', auth()->user()->id)
                ->where('products.title', 'like', "%{$search}%")
                ->select('products.image_product_url', 'products.title', 'categories.name', 'products.price', 'user_payments.status', 'products.id')
                ->paginate(4);
            ;
        } else {
            $data = UserPayment::query()
                ->join('transactions', 'transactions.user_payment_id', '=', 'user_payments.id')
                ->join('purchases', 'purchases.transaction_id', '=', 'transactions.id')
                ->join('products', 'products.id', '=', 'purchases.product_id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('products.seller_id', '=', auth()->user()->id)
                ->select('products.image_product_url', 'products.title', 'categories.name', 'products.price', 'user_payments.status', 'user_payments.id as id_up', 'products.id', 'products.description', 'user_payments.payment_proof_url')
                ->paginate(4);
            ;
        }

        // Tentukan jumlah item per halaman
        $perPage = 4;

        // Ambil halaman saat ini dari query string, defaultnya 1
        $currentPage = $request->input('page', 1);

        // Hitung offset
        $offset = ($currentPage - 1) * $perPage;


        $totalData = $data->total();

        // Hitung jumlah halaman
        $totalPages = ceil($totalData / $perPage);

        // Hitung item yang sedang ditampilkan
        $firstItem = $offset + 1;
        $lastItem = min($offset + $perPage, $totalData);

        // Buat elemen pagination seperti yang ada di metode elements()
        $window = $this->paginationWindow($currentPage, $totalPages);

        return \response()->view('admin.product_orders.index', compact('data', 'totalData', 'perPage', 'currentPage', 'totalPages', 'window', 'firstItem', 'lastItem'));
    }

    protected function paginationWindow($currentPage, $totalPages)
    {
        $onEachSide = 3; // Number of links on each side of the current page
        $window = [];

        // Previous and next ranges
        $start = max($currentPage - $onEachSide, 1);
        $end = min($currentPage + $onEachSide, $totalPages);

        // Window for pagination
        for ($i = $start; $i <= $end; $i++) {
            $window[] = $i;
        }

        // Add ellipses and edges
        $pagination = [];
        if ($start > 1) {
            $pagination[] = 1;
            if ($start > 2) {
                $pagination[] = '...';
            }
        }
        $pagination = array_merge($pagination, $window);
        if ($end < $totalPages) {
            if ($end < $totalPages - 1) {
                $pagination[] = '...';
            }
            $pagination[] = $totalPages;
        }

        return $pagination;
    }


    public function detail(Request $request, $id): Response
    {
        $data = $request->input('product');
        $product = json_decode(base64_decode($data));
        return \response()->view('admin.product_orders.details', ['product' => $product]);
    }

    public function doApproveOrDisapprove(ApproveOrDisapproveRequest $request, $id)
    {
        $isApproved = $request->input('approve');
        $paymentId = $request->query('id_payments');

        if ($isApproved) {
            $userPayment = UserPayment::query()->where('id', $paymentId)->first();
            $userPayment->status = 'paid';
            $userPayment->save();
            return redirect()->route('product.order.index');
        }

        if ($isApproved != true) {
            $userPayment = UserPayment::query()->where('id', $paymentId)->first();
            $userPayment->status = 'disapproved';
            $userPayment->reason = $request->input('reason');
            $userPayment->save();
            return redirect()->route('product.order.index');
        }


        return redirect()->route('product.approve.or.disapprove');
    }
}
