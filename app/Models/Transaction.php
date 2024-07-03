<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'user_payment_id',
        'serial_no_transactions'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_payment(): BelongsTo
    {
        return $this->belongsTo(UserPayment::class, 'user_payment_id', 'id');
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class, 'transaction_id', 'id');
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class, 'transaction_id', 'id');
    }


    public function buyProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'purchases', 'transaction_id', 'product_id');
    }


}
