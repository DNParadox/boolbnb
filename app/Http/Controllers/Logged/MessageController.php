<?php

namespace App\Http\Controllers\Logged;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Apartment;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
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
        // ricarca degli appartamenti registrati dallo user
        $apartments = Apartment::Where('users_id', '=', $user->id)->first();
        if(!$apartments){
            $have_one = false;
            $data = [
                'user' => $user,
                'have_one' => $have_one,
            ];
        } else {
            $messages = Message::Where('apartment_id', '=', $apartments->id)->latest()->first();
            if($messages->count() > 0){
                $have_one_message = true;
            } else {
                $have_one_message = false;
            }
            $data = [
                'apartments' => $apartments,
                'user' => $user,
                'messages' => $messages,
                'have_one' => $have_one,
                'have_one_message' => $have_one_message
            ];
        }
    
        return view('logged.message.index',  $data );
    }
}