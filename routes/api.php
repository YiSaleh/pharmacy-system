<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Controller\API\UserAddressController;
use App\Http\Controllers\API\UserController;
// use App\Http\Controllers\API\UserController;
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


Route::post('/user-address/create', 'API\UserAddressesController@create');

Route::get('/user-address/view/{user_id}', 'API\UserAddressesController@view');

Route::patch('/user-address/update/{user_id}', 'API\UserAddressesController@update');

Route::post('/users','API\UserController@store');
