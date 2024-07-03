<?php

namespace App\Http\Controllers;

use App\Helper\PaginationHelper;
use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\UserPayment;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Nonstandard\Uuid;
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
        $window = PaginationHelper::paginationWindow($currentPage, $totalPages);


        $comments = [];
        foreach ($purchases as $purchase) {
            $review = Review::query()->where('user_id', \auth()->user()->id)->where('product_id', $purchase->product_id)->first();
            $comments[$purchase->product_id] =  $review->comments ?? null;
            $comments["isChecked-$purchase->product_id"] =  $review->star ?? null;

        }

        return \response()->view('admin.transactions.index', compact('purchases', 'totalPurchases', 'perPage', 'currentPage', 'totalPages', 'window', 'firstItem', 'lastItem', 'comments'));
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
            ->select(
                'c.name',
                'p2.title',
                'p2.image_product_url',
                'p2.description',
                'up.payment_proof_url',
                'p2.price',
                'up.status',
                'p2.asset_product_url',
                'p2.id',
                'up.reason',
                'up.updated_at',
                'up.id as upid',
                'up.count_upload as total_up',
                'up.upload_at'
            )
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

        $prevReview = Review::query()->where('product_id', $id)->where('user_id', \auth()->user()->id)->first();

        if ($prevReview != null && $prevReview->created_at == $prevReview->updated_at) {
            $prevReview->star = $data['default-radio'];
            $prevReview->comments = $data['comment'];
            $prevReview->save();
            toast('Comment Berhasil Diupdate', 'success');
        } else if ($prevReview == null) {
            $review = new Review();
            $review->star = $data['default-radio'];
            $review->comments = $data['comment'];
            $review->user_id = \auth()->user()->id;
            $review->product_id = $id;
            $review->save();
            toast('Comment Berhasil Ditambahkan', 'success');
        } else {
            toast('Comment Hanya Boleh 2 kali', 'error');
        }



        return redirect()->route('purchases.index');

    }

    public function uploadProve(Request $request, $id, $upid)
    {
        $userPayment = UserPayment::query()->where('id', $upid)->first();
        if ($request['proof'] != null) {
            $proofFile = $request['proof'];

            $proofName = Uuid::uuid5(Uuid::NAMESPACE_DNS, time() . "proof_") . '.' . $proofFile->getClientOriginalExtension();

            $proofFile->storeAs("/products/proof_payment/" . auth()->user()->id, $proofName , 'local');
            $userPayment->payment_proof_url = auth()->user()->id . "/" . $proofName;
            $userPayment->upload_at = DB::raw('CURRENT_TIMESTAMP');
            if ($userPayment->count_upload == null) {
                $userPayment->count_upload = 1;
            } else {
                $userPayment->count_upload = $userPayment->count_upload + 1;
            }
            $userPayment->save();
            toast('Kamu Berhasil Mengupload Bukti', 'success');
        }

        return redirect()->route('purchases.detail', ['id' => $id]);
    }

    public function doDownload(Request $request)
    {
        $product = Product::query()->where('id', $request->input('id'))->first();
        if (isset(\auth()->user()->purchases->where('product_id', $request->query('id'))->first()->product_id)) {
            return \response()->download(storage_path("/app/product/assets/" . "$product->asset_product_url"));
        } else {
            return redirect()->route('home.product.detail', ['id' => $request->query('id')]);
        }
    }

    public function doInvoices()
    {

    }

}
