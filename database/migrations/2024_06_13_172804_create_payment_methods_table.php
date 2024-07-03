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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('payment_account_recipient_name');
            $table->string('payment_account_name');
            $table->string('payment_account_number');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->on('users')->references('id');
            $table->unique(['payment_account_name', 'payment_account_number', 'user_id'], 'unique_name_bank_and_number_and_user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
