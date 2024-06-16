<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Review;
use App\Models\Transaction;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TransactionController extends Controller
{
    public function index(Request $request): Response
    {
        Session::put('sales_index_page', $request->input('page', 1));

        $user = auth()->user();

        $userId = $user->id;

        #for search
        if ($request->query('simple-search')) {

            $search =  $request->query('simple-search');
            $purchases = Purchase::query()->join('transactions as t', 't.id', '=', 'purchases.transaction_id')
                ->join('products', 'products.id', '=', 'purchases.product_id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('user_payments', 't.user_payment_id', '=', 'user_payments.id')
                ->where('t.user_id', $userId)
                ->where('products.title', 'like', "%{$search}%")
                ->select('purchases.*', 't.*', 'products.*', 'categories.name as category_name', 'user_payments.*')
            ->paginate(4);

        } else {
            $purchases = Purchase::whereTransactionUserId($userId)
                ->paginate(4);
        }

        // Tentukan jumlah item per halaman
        $perPage = 4;

        // Ambil halaman saat ini dari query string, defaultnya 1
        $currentPage = $request->input('page', 1);

        // Hitung offset
        $offset = ($currentPage - 1) * $perPage;


        $totalPurchases = $purchases->total();

        // Hitung jumlah halaman
        $totalPages = ceil($totalPurchases / $perPage);

        // Hitung item yang sedang ditampilkan
        $firstItem = $offset + 1;
        $lastItem = min($offset + $perPage, $totalPurchases);

        // Buat elemen pagination seperti yang ada di metode elements()
        $window = $this->paginationWindow($currentPage, $totalPages);


        $comments = [];
        foreach ($purchases as $purchase) {
            $review = Review::query()->where('user_id', \auth()->user()->id)->where('product_id', $purchase->product_id)->first();
            $comments[$purchase->product_id] =  $review->comments ?? null;
            $comments["isChecked-$purchase->product_id"] =  $review->star ?? null;

        }

        return \response()->view('admin.transactions.index', compact('purchases', 'totalPurchases', 'perPage', 'currentPage', 'totalPages', 'window', 'firstItem', 'lastItem', 'comments'));
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


    public function detail($id): Response
    {

        $purchase_detail = Transaction::query()
            ->join('user_payments as up', 'transactions.user_payment_id', '=', 'up.id')
            ->join('purchases as p', 'p.transaction_id', '=', 'transactions.id')
            ->join('products as p2', 'p2.id', '=', 'p.product_id')
            ->join('categories as c', 'c.id', '=', 'p2.category_id')
            ->where('p.product_id', $id)
            ->where('transactions.user_id', \auth()->user()->id)
            ->select('c.name', 'p2.title', 'p2.image_product_url', 'p2.description', 'up.payment_proof_url', 'p2.price', 'up.status', 'p2.asset_product_url', 'p2.id')
            ->first();

        $review = Review::query()->where('user_id', \auth()->user()->id)->where('product_id', $id)->first();

        $data = [
            'purchase_detail' => $purchase_detail,
            'review' => $review,
        ];

        return \response()->view('admin.transactions.details', $data);
    }

    public function doComment(ReviewRequest $request, $id)
    {
        $data = $request->only(['default-radio', 'comment']);

        $review = new Review();
        $review->star = $data['default-radio'];
        $review->comments = $data['comment'];
        $review->user_id = \auth()->user()->id;
        $review->product_id = $id;
        $review->save();


        return redirect()->route('purchases.index');

    }

    public function doDownload(Request $request)
    {
        $product = Product::query()->where('id', $request->input('id'))->first();

        return \response()->download(storage_path("/app/product/assets/" . "$product->asset_product_url"));
    }

}
