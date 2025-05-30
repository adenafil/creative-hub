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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('user_payment_id')->nullable(false);
            $table->string('serial_no_transactions')->nullable(true);
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_payment_id')->references('id')->on('user_payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
