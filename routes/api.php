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
Route::post('/users/register','API\UserController@store');
//login
Route::post('/users/login','API\UserController@login');

//update
// when you test in postman you should set verb of request=post and add an attribute called 
// _methoduserAddress and it's value=put because postman doesn't support put requestMethod 
Route::put('/users/{user}','API\UserController@update')->middleware('auth:sanctum','verified');


//------------user addresses urls------------

Route::post('/user-address/create', 'API\UserAddressesController@create');

Route::get('/user-address/view/{user_id}', 'API\UserAddressesController@view');

Route::delete('/user-address/delete/{user_id}', 'API\UserAddressesController@delete');

Route::patch('/user-address/update/{user_id}', 'API\UserAddressesController@update');


//--------------order urls-----------------

Route::get('/orders/view/{id}', 'API\OrderController@view');

Route::post('/orders/create', 'API\OrderController@create');

Route::put('/orders/update/{id}', 'API\OrderController@update');

//--------------user order urls-----------------

Route::get('/user-orders/view/{user_id}', 'API\UserOrderController@viewUserOrders');

Route::get('/user-orders/view/{user_id}/{order_id}', array('as'=>'user_id/order_id','uses'=>'API\UserOrderController@viewOrder'));
