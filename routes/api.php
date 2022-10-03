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
    return $request->user();
});

Route::get('/search','Api\ApartmentController@index');
Route::get('/sponsored','Api\ApartmentController@sponsored');
Route::get('/services','Api\ServiceController@index');
Route::get('/contact/{id}','Api\ApartmentController@show');
Route::get('/filterby/{distance}/{room}/{bed}/{latitude}/{longitude}/{services}','Api\ApartmentController@filterby');
Route::get('/sendmessage/{email}/{apartment_id}/{message}','Api\MessageController@save');


