<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function addProductIntoCart(): BelongsToMany
    {
       return $this->belongsToMany(
            Product::class,
            'table_users_addcarts_products',
            'cart_id',
            'product_id'
        );
    }
}
