<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function save($email,$apartment,$message)
    {
        $message = new Message();
        $message->apartment_id = $apartment;
        $message->email = $email;
        $message->message = $message;
        $message->save();

        $data = [
            'success' => true,
        ];
        return response()->json($data);
    }
}
