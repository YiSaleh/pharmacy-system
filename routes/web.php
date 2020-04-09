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

Route::get('/', function () {
    return view('home');
})->name('mainPage');

Auth::routes(['register' => false ,'verify' => true ]);
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home/create/{field}', 'HomeController@create')->name('home.create');
// Route::get('/home/{field}', 'HomeController@show')->name('home.show');


Route::middleware(['auth', 'role:admin'])->group(function () {
//user index 
Route::get('/users','UserController@index')->name('users.index');
//create new user
Route::get('/users/create','UserController@create')->name('users.create');
// store user data in db
Route::post('/users','UserController@store')->name('users.store');
// to update user info 
Route::put('users/{user}','UserController@update')->name('users.update');
// to delete user
Route::delete('users/{user}','UserController@destroy')->name('users.destroy');
// to edit user info 
Route::get('/users/{user}/edit','UserController@edit')->name('users.edit');
// to show one user
Route::get('/users/{user}','UserController@show')->name('users.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
//show all users addresses
Route::get('/useraddresses','AddressController@index')->name('useraddresses.index');
// create new user address
Route::get('/useraddresses/create','AddressController@create')->name('useraddresses.create');
// store user address in db
Route::post('/useraddresses','AddressController@store')->name('useraddresses.store');
// to update user address
Route::put('/useraddresses/{useraddress}','AddressController@update')->name('useraddresses.update');
// to delete user address
Route::delete('useraddresses/{useraddress}','AddressController@destroy')->name('useraddresses.destroy');
// to edit user address and go to form
Route::get('/useraddresses/{useraddress}/edit','AddressController@edit')->name('useraddresses.edit');
// view specific address
Route::get('/useraddresses/{useraddress}','AddressController@show')->name('useraddresses.show');
});


//show all areas
Route::get('/areas','AreaController@index')->name('areas.index');
Route::get('/areas/create','AreaController@create')->name('areas.create');
Route::post('/areas','AreaController@store')->name('areas.store');
Route::get('/areas/edit/{area}','AreaController@edit')->name('areas.edit');
Route::put('/areas/{area}','AreaController@update')->name('areas.update');
Route::delete('areas/{area}','AreaController@destroy')->name('areas.destroy');
Route::get('/areas/{area}','AreaController@show')->name('areas.show');


//show all users orders
Route::get('/order','OrderController@index')->name('orders.index');

//create an order 
Route::get('/order/create', 'OrderController@create')->name('orders.create');

//to delete a user by id
Route::delete('order/{order}','OrderController@delete')->name('orders.delete');

//view a selected user by id 
Route::get('/order/{order}','OrderController@show')->name('orders.show');


Route::get('/revenue','RevenueController@show')->name('revenue.show');

Route::get('/revenues','RevenueController@index')->name('revenue.index');


//all pharmacy
Route::get('/pharmacy','PharmacyController@index')->name('pharmacy.index');
//create new pharmacy
Route::get('/pharmacy/create','PharmacyController@create')->name('pharmacy.create');
Route::post('/pharmacy','PharmacyController@store')->name('pharmacy.store');
//edit pharmacy info
Route::get('/pharmacy/edit/{pharmacy}','PharmacyController@edit')->name('pharmacy.edit');
Route::put('/pharmacy/{pharmacy}','PharmacyController@update')->name('pharmacy.update');
//show a specific pharmacy details
Route::get('/pharmacy/{pharmacy}','PharmacyController@show')->name('pharmacy.show');
//delete pharmacy
Route::delete('pharmacy/{pharmacy}','PharmacyController@destroy')->name('pharmacy.destroy');

