<?php

use Illuminate\Http\Request;

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



Route::get('v1/catalog','APICatallogController@index'); //Funciona
Route::get ('v1/catalog/{id}','APICatallogController@show'); //Funciona
Route::post ('v1/catalog','APICatallogController@store')->middleware('auth.basic.once'); //Funciona
Route::put ('v1/catalog/{id}','APICatallogController@update')->middleware('auth.basic.once');//Funciona
Route::delete ('v1/catalog/{id}','APICatallogController@destroy')->middleware('auth.basic.once'); //Funciona
Route::put ('v1/catalog/{id}/rent','APICatallogController@putRent')->middleware('auth.basic.once'); //Funciona
Route::put ('v1/catalog/{id}/return','APICatallogController@putReturn')->middleware('auth.basic.once'); //Funciona
