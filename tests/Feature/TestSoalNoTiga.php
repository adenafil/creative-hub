<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Transaction;
use App\Models\UserPayment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Ramsey\Uuid\Nonstandard\Uuid;
use Tests\TestCase;

class TestSoalNoTiga extends TestCase
{
    #[Test]
    public function testRunning(): void
    {

        $results = Product::join('payment_methods', 'payment_methods.user_id', '=', 'products.seller_id')
            ->select('products.id as product_id', 'products.seller_id', 'payment_methods.id as payment_method_id')
            ->limit(10)
            ->get();


        foreach ($results as $result) {
            echo "Product ID: {$result->product_id}, Seller ID: {$result->seller_id}, Payment Method ID: {$result->payment_method_id}\n";
            $this->seedTugasNoTiga(100, $result->payment_method_id, $result->product_id, $result->seller_id);
        }

        self::assertTrue(true);
    }

    public function seedTugasNoTiga(int $max_user, int $payment_method_id, int $product_id, int $seller_id)
    {
        $percobaan = 0;
        $index_id_user = 1;

        while ($percobaan < 101) {

            if ($index_id_user != $seller_id) {
                $user_payment = new UserPayment();
                $user_payment->user_id = $index_id_user;
                $user_payment->payment_method_id = $payment_method_id;
                $user_payment->payment_proof_url = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQR_T-JRHXZZvk-lvsGBB0rYUbKYWyrWlqhYg&s";
                $user_payment->status = "paid";
                $user_payment->save();

                $transaction = new Transaction();
                $transaction->user_id = $index_id_user;
                $transaction->user_payment_id = $user_payment->id;
                $transaction->serial_no_transactions = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'transaction-' . $user_payment->id)->toString();
                $transaction->save();

                $purchase = new Purchase();
                $purchase->transaction_id = $transaction->id;
                $purchase->product_id = $product_id;
                $purchase->save();

                $percobaan++;
            }
            $index_id_user++;

        }
    }
}
