<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::get('/search','Api\ApartmentController@index');
Route::get('/sponsored','Api\ApartmentController@sponsored');
Route::get('/services','Api\ServiceController@index');
Route::get('/contact/{id}','Api\ApartmentController@show');
Route::get('/filterby/{distance}/{room}/{bed}/{latitude}/{longitude}','Api\ApartmentController@filterby');
Route::post('/sendmessage','Api\MessageController@message');
Route::get('/user', 'Api\UserController@index');

Route::get('orders/generate', 'Api\Orders\OrderController@generate'); 
Route::post('orders/make/payment', 
'Api\Orders\OrderController@makePayment');
