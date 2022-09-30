<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    public function index(){
        
        $apartment = Apartment::Paginate(12);

        $data = [
            
        ]

    }
}
