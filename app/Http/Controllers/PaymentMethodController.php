<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentMethodController extends Controller
{
    public function update(UpdatePaymentMethodRequest $request)
    {
        $payment_method = new PaymentMethod();
        $payment_method->payment_account_recipient_name = $request['recipient-name'];
        $payment_method->payment_account_name = $request['payment-account-name'];
        $payment_method->payment_account_number = $request['payment-account-number'];
        $payment_method->user_id = $request->user()->id;

        try {
            $payment_method->save();
        } catch(\Exception $exception) {
        return Redirect::route('profile.edit');
        };

        return Redirect::route('profile.edit');
    }
}
