<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsorship;
use Braintree\Gateway;

class ProductController extends Controller
{
    public function index(Request $request,Gateway $gateway)
    {
        $token_auto = $gateway->clientToken()->generate();
        $sponsorships = Sponsorship::all();

        $data = [
            'have_one' => true,
            'sponsorships' => $sponsorships,
            'tokenAutorization' => $token_auto,
            'apartment' => $request->apartment,
        ];

        return view('logged.sponsorship.index',  $data);
    }
}
