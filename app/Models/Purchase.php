<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function scopeWhereTransactionUserId($query, $userId)
    {
        return $query->join('transactions as t', function ($join) use ($userId) {
            $join->on('t.id', '=', 'purchases.transaction_id')
                ->where('t.user_id', '=', $userId);
        })
            ->join('products', 'products.id', '=', 'purchases.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('user_payments', 't.user_payment_id', '=', 'user_payments.id')
            ->select('purchases.*', 't.*', 'products.*', 'categories.name', 'user_payments.*')
            ;
    }


    public function scopeWhereTransactionUserIdAndSearch($query, $userId, $search)
    {
        return $query
            ->join('transactions as t', 't.id', '=', 'purchases.transaction_id')
            ->join('products', 'products.id', '=', 'purchases.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('user_payments', 't.user_payment_id', '=', 'user_payments.id')
            ->where('t.user_id', $userId)
            ->where('products.title', 'like', "%{$search}%")
            ->select('purchases.*', 't.*', 'products.*', 'categories.name as category_name', 'user_payments.*');
    }


}
