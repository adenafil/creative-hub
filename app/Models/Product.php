<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "products";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = true;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "seller_id", "id");
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, "product_id", "id");
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class, 'product_id', 'id');
    }

    public function boughtByUserTransactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'purchases', 'product_id', 'transaction_id');
    }

    public function productAddedIntoCart(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'table_users_addcarts_products',
            'product_id',
            'user_id'
        );
    }
}
