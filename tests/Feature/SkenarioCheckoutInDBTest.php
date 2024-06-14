<?php

namespace Tests\Feature;

use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPayment;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PaymentMethodSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\UserDetailSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SkenarioCheckoutInDBTest extends TestCase
{
    public function testCheckout()
    {
        $this->seed([
            UserSeeder::class,
            UserDetailSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            PaymentMethodSeeder::class
        ]);

        $user_payment = new UserPayment();
        $user_payment->user_id = User::query()->first()->id;
        $user_payment->payment_method_id = PaymentMethod::query()->first()->id;
        $user_payment->payment_proof_url = "https://public.bnbstatic.com/image/cms/article/body/202302/d9f75be540977a5782c30a277ff180b1.jpeg";
        $user_payment->status = 'pending';
        $user_payment->save();

        $transactions = new Transaction();
        $transactions->user_id = UserPayment::query()->first()->user_id;
        $transactions->user_payment_id = UserPayment::query()->first()->id;
        $transactions->save();

        $idProduct = Product::query()->first()->id;
        $transactions->buyProducts()->attach($idProduct);
        $transactions->buyProducts()->attach( ($idProduct + 1) );

        $purchases = Purchase::query()->get();
        self::assertNotNull($purchases);
        self::assertCount(2, $purchases);

        # tes lawan arah
        $product = Product::query()->first();
        self::assertNotNull($product);
        $product_transaction = $product->boughtByUserTransactions;
        self::assertNotNull($product_transaction);

        # tes purchased transaction id by using one product
        $purchase = $product->purchases;
        self::assertNotNull($purchase);
        self::assertCount(1, $purchase);
        self::assertEquals($product->id, $purchase[0]->product_id);

        $user = User::query()->first();
        $purchase_of_user = $user->purchases;
        self::assertNotNull($purchase_of_user);
        self::assertCount(2, $purchase_of_user);
    }
}
