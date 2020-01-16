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



//login route
Route::post('login', 'API\UserController@login');
//register route
Route::post('register', 'API\UserController@register');


//middle ware auth
Route::group(['middleware' => 'auth:api'], function(){

	//protected router with token auth
	Route::get('posts','ArticalController@index')->middleware('auth:api');
   Route::post('posts', 'ArticalController@store');
   Route::post('details', 'API\UserController@details');
 });




  //without protected token auth
 //  Route::get('posts','ArticalController@index')->middleware('auth:api');
 // Route::post('posts', 'ArticalController@store');
 // Route::post('details', 'API\UserController@details');
