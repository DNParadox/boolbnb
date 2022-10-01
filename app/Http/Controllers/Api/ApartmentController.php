<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\User;

class ApartmentController extends Controller
{
    public function index(){
          
        $apartments = Apartment::with(['service', 'sponsorship'])->get();

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
          
        $apartments = Apartment::where('is_sponsored', 1)->get();

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
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(Request $request, $id)
    {
        $user = Auth::user();
        $apartment = Apartment::findOrFail($id); 
        if($apartment->photo){
            $apartment->photo = asset('storage/'. $apartment->photo);
        }

        $data = [
            'success' => true,
            'results' => $apartment,
            'user' => $user,
        ];
        
        return response()->json($data);
    }
}
