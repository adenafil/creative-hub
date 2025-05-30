<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function user_detail(): HasOne
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, "seller_id", "id");
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, "user_id", "id");
    }

    public function payment_methods(): HasMany
    {
        return $this->hasMany(PaymentMethod::class, 'user_id', 'id');
    }

    public function user_payments(): HasMany
    {
        return $this->hasMany(UserPayment::class, 'user_id', 'id');
    }

    public function purchases(): HasManyThrough
    {
        return $this->hasManyThrough(Purchase::class, Transaction::class, 'user_id', 'transaction_id', 'id', 'id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    public function addProductIntoCart(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'table_users_addcarts_products',
            'user_id',
            'product_id'
        );
    }




}
