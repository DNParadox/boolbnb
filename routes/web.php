<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')->namespace('Logged')->name('logged.')->prefix('logged')->group(function(){
    Route::get('/','ApartmentController@index');
    Route::resource('apartments','ApartmentController');
    Route::get('/message','MessageController@index')->name('message');
    Route::get('/sponsorship','ProductController@index')->name('sponsorship');
});

Route::middleware('auth')->get('/users', function () {
    return response()->json(Auth::user());
});

Route::get('{any?}', function () {
    return view('guest.home'); 
})->where('any','.*');


