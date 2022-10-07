<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Sponsorship;

class OrderController extends Controller
{
    public function generate(Request $request,Gateway $gateway){
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data);
    }
    public function makePayment(OrderRequest $request,Gateway $gateway){
        $product = Sponsorship::findOrFail($request->product);
        
        $result = $gateway->transaction()->sale([
            'amount' => $product->price,
            'paymentMethodNonce' => "fake-valid-nonce",
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if($result->success){
            $data = [
                'success' => true,
                'message' => 'transazione eseguita',
            ];

            return response()->json($data,200);
        } else {
            $data = [
                'success' => false,
                'message' => 'transazione fallita',
            ];

            return response()->json($data,404);
        }
    }
}
