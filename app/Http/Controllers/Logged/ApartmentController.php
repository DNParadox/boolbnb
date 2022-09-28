<?php

namespace App\Http\Controllers\Logged;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\User;
use App\Service;

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
        // ricarca degli appartamenti registrati dallo user
        $apartments = Apartment::Where('user_id', "=", $user->id);
        $data = [
            'apartments' => $apartments,
            'user' => $user,
        ];

        return view('logged.apartments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        $data = [
            'services' => $services,
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
        $request->validate($this->getValidationRules());
        $add_apartment = $request->all();
        dd($add_apartment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    protected function getValidationRules() {
        // Creo le Validazioni per i campi nel form
        return [
            'title' => 'required|min:5|max:100',
            'room_number' => 'required|min:1|max:999|numeric',
            'bed_number' => 'required|min:1|max:999|numeric',
            'cap' => 'required|min:1|max:99999|numeric',
            'city' => 'required|min:5|max:100',
            'bathroom_number' => 'required|min:1|max:999|numeric',
            'address' => 'required|min:10|max:60000',
            'price' => 'required|min:1|max:9999999|numeric',
            'photo' => 'image|max: 1024|nullable',
            // 'visibility' => 'required|Boolean',
            'description' => 'required|min:10|max:60000',
            'square_meters' => 'required|min:1|max:99999|numeric',
            'users_id' => 'nullable|exists:users,id',
        ];
    }
}
