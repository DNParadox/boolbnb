<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
    public function message(Request $request)
    {
        $data = $request->all();

        $message_to_save = new Message();
        $message_to_save->fill($data);
        $message_to_save->send_date = '2022-10-10';
        $message_to_save->save();

        return response()->json([
            'success' => true
        ]);
    }
}
