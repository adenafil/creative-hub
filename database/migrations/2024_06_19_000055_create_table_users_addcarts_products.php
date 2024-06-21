<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_users_addcarts_products', function (Blueprint $table) {
            $table->unsignedBigInteger('cart_id')->nullable(false);
            $table->unsignedBigInteger('product_id')->nullable(false);
            $table->primary(['cart_id', 'product_id']);
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_users_addcarts_products');
    }
};
