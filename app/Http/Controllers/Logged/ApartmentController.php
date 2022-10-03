<?php

namespace App\Http\Controllers\Logged;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\User;
use App\Service;
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
        $user = Auth::user();
        $have_one = true;
        $last_sponsorship = false;
        // ricarca degli appartamenti registrati dallo user
        $apartments = Apartment::Where('users_id', '=', $user->id)->first();
        // $sponsor = ApartmentSponsorship::all();
        // dd($sponsor[0]->start_date);
        if($apartments){
            // ricerca dell'ultima sponsorizzazione
            $last_sponsorship = ApartmentSponsorship::Where('apartment_id', '=', $apartments->id)->get();  
        }


        // controllo se un appartemento ha la sponsorizzazione
        if(!$last_sponsorship){
            $has_sponsorship = 'No';
        } else {
            $has_sponsorship = 'Si';
        }

        if(!$apartments){
            $have_one = false;                
        }

        $data = [
            'apartments' => $apartments,
            'user' => $user,
            'have_one' => $have_one,
            'has_sponsorship' => $has_sponsorship,
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
        
        return redirect()->route('logged.apartments.index');
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
        // ricarca degli appartamenti registrati dallo user
        $apartments = Apartment::Where('users_id', '=', $user->id)->first();
        // controllo se un utente ha registrato un appartamento
        if($apartments == null){
            
            $data = [
                'have_one' => false,
            ];
            
        }else {
            
            $data = [
                'have_one' => true,
                'apartments' => $apartments,
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
            if($old_apartment->cover){
              Storage::delete($old_apartment->cover);  
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

        return redirect()->route('logged.apartments.show', ['apartment' => $old_apartment->id]);
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
        $apartment_to_delete->delete();

        return redirect()->route('logged.apartments.index');
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
