<?php

namespace Tests\Feature;

use App\Models\PaymentMethod;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PaymentMethodSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\UserDetailSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentMethodTest extends TestCase
{
    public function testPaymentMethod()
    {
        $this->seed([
            UserSeeder::class,
            UserDetailSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            PaymentMethodSeeder::class
        ]);

        $payment_method = PaymentMethod::query()->first();

        self::assertNotNull($payment_method);
        self::assertEquals('OVO',$payment_method->payment_account_name);

        $user = $payment_method->user;
        self::assertNotNull($user);
        self::assertEquals('hasanhusain', $user->name);

    }
}
