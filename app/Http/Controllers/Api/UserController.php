<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        
        $user = Auth::id();
        $current = User::find($user);
        $data = [
            'success' => true,
            'user' => $current,
        ];
        return response()->json($data);
    }
}
