<?php

namespace App\Http\Controllers;
use BudPay\BudPayService;
use Illuminate\Http\Request;

class PaymentController
{
    protected $budPay;

    public function __construct(BudPayService $budPay)
    {
        $this->budPay = $budPay;
    }

    public function initializePayment(Request $request)
    {
        $amount = $request->input('amount');
        $callbackUrl = route('payment.callback');
        $customerName = $request->input('name');
        $customerEmail = $request->input('email');

        $response = $this->budPay->processPayment($amount, $callbackUrl, $customerName, $customerEmail);

        return response()->json($response);
    }

    public function createPaymentLink(Request $request)
    {
        $amount = $request->input('amount');
        $currency = 'NGN';
        $name = $request->input('name');
        $description = 'Payment for service';
        $redirectUrl = route('payment.success');

        $response = $this->budPay->createBudPayPaymentLink($amount, $currency, $name, $description, $redirectUrl);

        return response()->json($response);
    }
}
