<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Sponsorship;
use App\Apartment;
use App\ApartmentSponsorship;
use Carbon\Carbon;

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
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if($result->success){
            
            $apartment = Apartment::find($request->apartment);
            $apartment->is_sponsored = 1;
            $apartment->update();
            $sponsorization = new ApartmentSponsorship();
            $sponsorization->apartment_id = $request->apartment;
            $sponsorization->sponsorship_id = $request->product;
            $sponsorization->start_date = Carbon::now()->format('Y-m-d');
            $sponsorization->end_date = Carbon::now()->addHour($product->hour);
            $sponsorization->timestamps = false;
            $sponsorization->save();
            
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

            return response()->json($data,402);
        }
    }
}
