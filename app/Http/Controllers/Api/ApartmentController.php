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
        $apartment = Apartment::where('id', $id)->with('service')->first();
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
    public function filterby($distance,$room,$bed,$latitude,$longitude,Request $request)
    {
        $service_check = $request->all();
        $filered_apartment = array();
        $filered_apartment_service = array();
        $apartments = Apartment::where('bed_number','>=',$bed)
        ->where('room_number','>=',$room)->with('service')->get();
        foreach($apartments as $apartment) {
            if($this->getDistances(floatval($latitude),floatval($longitude),floatval($apartment->lat),floatval($apartment->lon)) < $distance){
                $filered_apartment[] = $apartment;   
            }
            if($apartment->photo){
                $apartment->photo = asset('storage/'. $apartment->photo);
            }
        }

        if($service_check){
            foreach($filered_apartment as $filered){
                $checking = 0;
                foreach ($filered->service as $service) {
                    if(in_array($service['name'] ,$service_check['service'])){
                        ++$checking;
                    }
                }
                if($checking == count($service_check['service'])){
                    $filered_apartment_service[] = $filered;
                }
            }
        }


        if($service_check){
            $data = [
                'success' => true,   
                'apartments' => $filered_apartment_service, 
                'data' => $service_check['service'], 
                'check' => $checking,
            ];
        } else {
            $data = [
                'success' => true,   
                'apartments' => $filered_apartment, 
            ];
        }

        
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
