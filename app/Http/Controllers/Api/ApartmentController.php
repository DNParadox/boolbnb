<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\ApartmentSponsorship;
use App\Sponsorship;

class ApartmentController extends Controller
{
    public function index(){
          
        $apartments = Apartment::all();

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

    public function sponsored(){
          
        $apartments = Apartment::Where('is_sponsored', false)->get();

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
    /**
    * Display the specified resource.
    *
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id); 
        if($apartment->photo){
            $apartment->photo = asset('storage/'. $apartment->photo);
        }
        
        return view('logged.apartments.show', $data);
    }
}
