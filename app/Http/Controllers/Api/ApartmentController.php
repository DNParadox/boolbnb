<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    public function index(){
        
        
        $apartments = Apartment::Paginate(12);

        foreach ($apartments as $apartment) {
            if($apartment->photo){
                $apartment->photo = asset('storage/'. $apartment->photo);
            }
        }

        $data = [
            'success' => true,
            'results' => $apartments,
        ];
        return response()->json($data);
    }
}
