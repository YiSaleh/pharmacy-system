<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 use Illuminate\Support\Facades\Hash;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//register
Route::post('/users','API\UserController@store');
//login
Route::post('/login','API\UserController@login');

Route::post('/user-address/create', 'API\UserAddressesController@create');

Route::get('/user-address/view/{user_id}', 'API\UserAddressesController@view');

Route::patch('/user-address/update/{user_id}', 'API\UserAddressesController@update');


