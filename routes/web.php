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
})->name('mainPage')->middleware('is-ban','auth');


Auth::routes(['register' => false ,'verify' => true ]);
Route::get('/home', ['uses'=>'HomeController@index','middleware' => ['auth','is-ban']])->name('home');


Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/users','UserController@index')->name('users.index');
        Route::get('/users/create','UserController@create')->name('users.create');
        Route::post('/users','UserController@store')->name('users.store');
        Route::put('users/{user}','UserController@update')->name('users.update');
        Route::delete('users/{user}','UserController@destroy')->name('users.destroy');
        Route::get('/users/{user}/edit','UserController@edit')->name('users.edit');
        Route::get('/users/{user}','UserController@show')->name('users.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/useraddresses','AddressController@index')->name('useraddresses.index');
        Route::get('/useraddresses/create','AddressController@create')->name('useraddresses.create');
        Route::post('/useraddresses','AddressController@store')->name('useraddresses.store');
        Route::put('/useraddresses/{useraddress}','AddressController@update')->name('useraddresses.update');
        Route::delete('useraddresses/{useraddress}','AddressController@destroy')->name('useraddresses.destroy');
        Route::get('/useraddresses/{useraddress}/edit','AddressController@edit')->name('useraddresses.edit');
        Route::get('/useraddresses/{useraddress}','AddressController@show')->name('useraddresses.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
   Route::get('/areas','AreaController@index')->name('areas.index');
   Route::get('/areas/create','AreaController@create')->name('areas.create');
   Route::post('/areas','AreaController@store')->name('areas.store');
   Route::get('/areas/edit/{area}','AreaController@edit')->name('areas.edit');
   Route::put('/areas/{area}','AreaController@update')->name('areas.update');
   Route::delete('areas/{area}','AreaController@destroy')->name('areas.destroy');
   Route::get('/areas/{area}','AreaController@show')->name('areas.show');
});

Route::middleware(['auth', 'role:admin|owner|doctor','is-ban'])->group(function () {
        //show all users orders
        Route::get('/orders','OrderController@index')->name('orders.index');
        //create an order 
        Route::get('/orders/create','OrderController@create')->name('orders.create');
        //to edit a certain order
        Route::get('/orders/{order}/edit','OrderController@edit')->name('orders.edit');
        //to update an order
        Route::put('/orders/{order}','OrderController@update')->name('orders.update');
        //to delete a user by id
        Route::delete('orders/{order}','OrderController@destroy')->name('orders.destroy');
        // send data directly to database
        Route::post('/orders','OrderController@store')->name('orders.store');
        // autocomplete function for medicine in creation order
        Route::post('/orders/autocomplete', 'OrderController@autocomplete')->name('orders.autocomplete');
        //view a selected user by id 
        Route::get('/orders/{order}','OrderController@show')->name('orders.show');

});

Route::middleware(['auth', 'role:admin|owner|doctor','is-ban'])->group(function () {
   Route::get('/medicines','MedicineController@index')->name('medicines.index');
   Route::get('/medicines/create','MedicineController@create')->name('medicines.create');
   Route::post('/medicines','MedicineController@store')->name('medicines.store');
   Route::get('/medicines/{medicine}/edit','MedicineController@edit')->name('medicines.edit');
   Route::put('/medicines/{medicine}','MedicineController@update')->name('medicines.update');
   Route::delete('medicines/{medicine}','MedicineController@destroy')->name('medicines.destroy');
   Route::get('/medicines/{medicine}','MedicineController@show')->name('medicines.show');

});

Route::get('/revenue','RevenueController@show')->name('revenue.show');

Route::get('/revenues','RevenueController@index')->name('revenue.index');


Route::middleware(['auth', 'role:admin'])->group(function () {
   Route::get('pharmacy/trash','PharmacyController@trash')->name('pharmacy.trash');
   Route::get('pharmacy/restore/{pharmacy)','PharmacyController@restore')->name('pharmacy.restore');
});

Route::middleware(['auth', 'role:admin|owner'])->group(function () {
   Route::get('/pharmacy','PharmacyController@index')->name('pharmacy.index');
   Route::get('/pharmacy/create','PharmacyController@create')->name('pharmacy.create');
   Route::post('/pharmacy','PharmacyController@store')->name('pharmacy.store');
   Route::get('/pharmacy/edit/{pharmacy}','PharmacyController@edit')->name('pharmacy.edit');
   Route::put('/pharmacy/{pharmacy}','PharmacyController@update')->name('pharmacy.update');
   Route::get('/pharmacy/{pharmacy}','PharmacyController@show')->name('pharmacy.show');
   Route::delete('pharmacy/{pharmacy}','PharmacyController@destroy')->name('pharmacy.destroy');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::get('/owners','OwnerController@index')->name('owners.index');
  Route::get('/owners/create','OwnerController@create')->name('owners.create');
  Route::post('/owners','OwnerController@store')->name('owners.store');
  Route::put('owners/{owner}','OwnerController@update')->name('owners.update');
  Route::delete('owners/{owner}','OwnerController@destroy')->name('owners.destroy');
  Route::get('/owners/{owner}/edit','OwnerController@edit')->name('owners.edit');
  Route::get('/owners/{owner}','OwnerController@show')->name('owners.show');
});

Route::middleware(['auth', 'role:admin|owner'])->group(function () {
  Route::get('/doctors','DoctorsController@index')->name('doctors.index');
  Route::get('/doctors/create','DoctorsController@create')->name('doctors.create');
  Route::post('/doctors','DoctorsController@store')->name('doctors.store');
  Route::put('doctors/{user}','DoctorsController@update')->name('doctors.update');
  Route::delete('doctors/{doctor}','DoctorsController@destroy')->name('doctors.destroy');
  Route::get('/doctors/{doctor}/edit','DoctorsController@edit')->name('doctors.edit');
  Route::get('/doctors/{doctor}','DoctorsController@show')->name('doctors.show');
  Route::get('/doctor/{doctor}','DoctorsController@banned')->name('doctors.banned');
});