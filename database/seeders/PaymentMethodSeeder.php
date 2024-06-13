<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_method = new PaymentMethod();
        $payment_method->payment_account_recipient_name = 'Hasan Husain';
        $payment_method->payment_account_name = 'OVO';
        $payment_method->payment_account_number = '12345678910';
        $payment_method->user_id = User::query()->where('name', 'hasanhusain')->first()->id;
        $payment_method->save();
    }
}
