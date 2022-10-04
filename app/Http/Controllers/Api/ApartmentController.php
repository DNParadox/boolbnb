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
        $apartment = Apartment::findOrFail($id)->with('service')->first(); 
        if($apartment->photo){
            $apartment->photo = asset('storage/'. $apartment->photo);
        }

        $data = [
            'success' => true,
            'results' => $apartment,       
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
    public function filterby($distance,$room,$bed,$latitude,$longitude,$services)
    {
        $filered_apartment = array();
        $apartments = Apartment::where('bed_number',$bed)
        ->where('room_number',$room)->get();
        foreach($apartments as $apartment) {
            if($this->getDistances(floatval($latitude),floatval($longitude),floatval($apartment->lat),floatval($apartment->lon)) < $distance){
                $filered_apartment[] = $apartment;
            }
            if($apartment->photo){
                $apartment->photo = asset('storage/'. $apartment->photo);
            }
        }
        

        $data = [
            'success' => true,   
            'apartments' => $filered_apartment,     
        ];
        
        return response()->json($data);
    }

    protected function getDistances($latitude1,$longitude1,$latitude2,$longitude2){ 
        // R: raggio della terra (paragonabile ad una sfera) in chilometri
        $r = 6371;
        $deltaLat = $this->degreeToRadians($latitude1 - $latitude2);
        $deltaLon = $this->degreeToRadians($longitude1 - $longitude2);

        $lat1 = $this->degreeToRadians($latitude1);
        $lat2 = $this->degreeToRadians($latitude2);

        $a = sin($deltaLat/2) * sin($deltaLat/2) +
        cos($lat1) * cos($lat2) * sin($deltaLon/2) * sin($deltaLon/2);

        $c = 2 * atan2(sqrt($a),sqrt(1-$a));
        $d = $r * $c;

        return $d / 1000;
    } 

    protected function degreeToRadians($degrees)
    {
      $pi = M_PI;
      return $degrees * ($pi/180);
    }
}
