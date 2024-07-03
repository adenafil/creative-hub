<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'payment_methods';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_payments(): HasMany
    {
        return $this->hasMany(UserPayment::class, 'payment_method_id', 'id');
    }
}
