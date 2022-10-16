<?php

namespace App\Http\Controllers\Logged;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\Sponsorship;
use App\User;
use App\Service;
use App\Message;
Use App\ApartmentSponsorship;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Permette di dare una risposta quando cancelli un appartamento
        $request_info = $request->all();
        $show_deleted_message = isset($request_info['deleted']) ? $request_info['deleted'] : null;
        $show_created_message = isset($request_info['created']) ? $request_info['created'] : null;

        // Costrutto Fine


        $user = Auth::user();
        $have_one = true;
        $last_sponsorship = false;
        $sponsor_detail =  null;
        // ricarca degli appartamenti registrati dallo user
        $apartments = Apartment::Where('users_id', '=', $user->id)->first();
        // $sponsor = ApartmentSponsorship::all();
        // dd($sponsor[0]->start_date);
        if($apartments){
            // ricerca dell'ultima sponsorizzazione
            $last_sponsorship = ApartmentSponsorship::Where('apartment_id', '=', $apartments->id)->get();  

            if(count($last_sponsorship) > 0){
                $sponsor_detail = Sponsorship::find($last_sponsorship[count($last_sponsorship) - 1]->sponsorship_id);
            }
        }

        if(!$apartments){
            $have_one = false;                
        }

        $data = [
            'apartments' => $apartments,
            'user' => $user,
            'have_one' => $have_one,
            'has_sponsorship' =>  $sponsor_detail,
            'show_deleted_message' => $show_deleted_message,
            'show_created_message' => $show_created_message,
        ];

        return view('logged.apartments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $services = Service::all();

        $data = [
            'have_one' => true,
            'services' => $services,
            'user' => $user,
        ];

        return view('logged.apartments.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRulesCreate());
        $form_data = $request->all();
        $user = Auth::user();
        if(isset($form_data['photo'])) {
            $img_path = Storage::put('apartment-photo', $form_data['photo']);
            $form_data['photo'] = $img_path;
        }

        $new_apartment = new Apartment();
        $new_apartment->address = $form_data['address'];
        $new_apartment->users_id = $user->id;
        $new_apartment->is_sponsored = 0;
        $new_apartment->fill($form_data);  
        $new_apartment->save();

        if(isset($form_data['services'])) {
            $new_apartment->service()->sync($form_data['services']);
        }

        $data = [];
        
        return redirect()->route('logged.apartments.index', ['created' => 'yes']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        // Take the current user
        $user = Auth::user();
        $form_data = $request->all();
        $sponsorship_type = null;
        $sponsorship = null;
        $show_updated_message = isset($form_data['updated']) ? $form_data['updated'] : null;
        // ricarca degli appartamenti registrati dallo user
        $apartments = Apartment::Where('users_id', '=', $user->id)->with("service")->first();
        // controllo se un utente ha registrato un appartamento
        $sponsorship = ApartmentSponsorship::where('apartment_id', $apartments->id)->get();
        if(count($sponsorship) > 0){
            $sponsorship_type = Sponsorship::findOrfail($sponsorship[count($sponsorship) - 1]->sponsorship_id)->first();
        }
        
        if($apartments == null){
            
            $data = [
                'have_one' => false,
            ];
            
        }else {
            
            $data = [
                'show_updated_message' => $show_updated_message,
                'have_one' => true,
                'apartments' => $apartments,
                'sponsorship' =>  $sponsorship_type,
            ]; 
        }
        
        return view('logged.apartments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        $services =  Service::all();
        

        $data = [
            'have_one' => true,
            'apartment' => $apartment,
            'services' => $services,
        ];

        return view('logged.apartments.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getValidationRulesEdit()); 
        $form_data = $request->all();
        $old_apartment = Apartment::findOrFail($id);
        
        if (isset($form_data['photo'])) {
            if($old_apartment->photo){
              Storage::delete($old_apartment->photo);  
            }
            
            $img_path = Storage::put('apartment-photo', $form_data['photo']);
            $form_data['photo'] = $img_path;
        }

        $old_apartment->update($form_data);

        if (isset($form_data['services'])) {
            $old_apartment->service()->sync($form_data['services']);
        } else {
            $old_apartment->service()->sync([]);
        }

        return redirect()->route('logged.apartments.show', ['apartment' => $old_apartment->id,'updated' => 'yes']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment_to_delete = Apartment::findOrFail($id);
        // $sponsors = ApartmentSponsorship::Where('apartment_id', '=', $id)->get();
        // dd($sponsors);
        
        if($apartment_to_delete->photo){
            Storage::delete($apartment_to_delete->photo);  
        }
        $apartment_to_delete->sponsorship()->sync([]);
        $apartment_to_delete->service()->sync([]);
        $messages = Message::where('apartment_id', $apartment_to_delete->id)->delete();
        $apartment_to_delete->delete();

        return redirect()->route('logged.apartments.index', ['deleted' => 'yes']);
    }


    protected function getValidationRulesCreate() {
        // Creo le Validazioni per i campi nel form
        return [
            'title' => 'required|min:5|max:100',
            'room_number' => 'required|min:0|max:999|numeric',
            'bed_number' => 'required|min:0|max:999|numeric',
            'bathroom' => 'required|min:0|max:999|numeric',
            'address' => 'required|min:1|max:60000',
            'price' => 'min:0|max:9999999|numeric|nullable',
            'photo' => 'required|image|max: 1024',
            'description' => 'min:1|max:60000|nullable',
            'square_meters' => 'required|min:1|max:99999|numeric',
            'users_id' => 'nullable|exists:users,id',
            'services' => 'required|min:1'
        ];
    }

    protected function getValidationRulesEdit() {
        // Creo le Validazioni per i campi nel form
        return [
            'title' => 'required|min:5|max:100',
            'room_number' => 'required|min:0|max:999|numeric',
            'bed_number' => 'required|min:0|max:999|numeric',
            'bathroom' => 'required|min:0|max:999|numeric',
            'address' => 'required|min:1|max:60000',
            'price' => 'min:0|max:9999999|numeric|nullable',
            'photo' => 'image|max: 1024|nullable',
            'description' => 'min:1|max:60000|nullable',
            'square_meters' => 'required|min:1|max:99999|numeric',
            'users_id' => 'nullable|exists:users,id',
            'services' => 'required|min:1'
        ];
    }
}
