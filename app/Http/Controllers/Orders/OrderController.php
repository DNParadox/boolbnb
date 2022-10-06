<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

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
    public function makePayment(Request $request,Gateway $gateway){
        return 'makePayment';
    }
}
