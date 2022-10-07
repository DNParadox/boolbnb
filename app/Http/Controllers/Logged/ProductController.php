<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsorship;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sponsorships = Sponsorship::all();

        $data = [
            'have_one' => true,
            'sponsorships' => $sponsorships
        ];

        return view('logged.sponsorship.index',  $data);
    }
}
