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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_product_url');
            $table->unsignedBigInteger("seller_id")->nullable(false);
            $table->text("description");
            $table->string('asset_product_url');
            $table->bigInteger("price");
            $table->unsignedBigInteger("category_id")->nullable(false);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign("seller_id")->on("users")->references("id");
            $table->foreign("category_id")->on("categories")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
