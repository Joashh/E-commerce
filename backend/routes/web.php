<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;


Route::post('/create-payment-intent', function(Request $request) {
    Stripe::setApiKey(env('STRIPE_SECRET')); // your secret key

    $paymentIntent = PaymentIntent::create([
        'amount' => 1000, // amount in cents ($10.00)
        'currency' => 'usd',
        // optionally: 'payment_method_types' => ['card'],
    ]);

    return response()->json([
        'clientSecret' => $paymentIntent->client_secret,
    ]);
});