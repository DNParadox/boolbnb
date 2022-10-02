<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
       $user = Auth::user();
        $data = [
            'success' => true,
            'user' => $user,
        ];
        return response()->json($data);
    }
}
