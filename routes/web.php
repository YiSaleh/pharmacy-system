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
        //user index 
        Route::get('/users','UsersController@index')->name('users.index');
        //create new user
        Route::get('/users/create','UsersController@create')->name('users.create');
        // store user data in db
        Route::post('/users','UsersController@store')->name('users.store');
        // to update user info 
        Route::put('users/{user}','UsersController@update')->name('users.update');
        // to delete user
        Route::delete('users/{user}','UsersController@destroy')->name('users.destroy');
        // to edit user info 
        Route::get('/users/{user}/edit','UsersController@edit')->name('users.edit');
        // to show one user
        Route::get('/users/{user}','UsersController@show')->name('users.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
        //show all users addresses
        Route::get('/useraddresses','AddressesController@index')->name('useraddresses.index');
        // create new user address
        Route::get('/useraddresses/create','AddressesController@create')->name('useraddresses.create');
        // store user address in db
        Route::post('/useraddresses','AddressesController@store')->name('useraddresses.store');
        // to update user address
        Route::put('/useraddresses/{useraddress}','AddressesController@update')->name('useraddresses.update');
        // to delete user address
        Route::delete('useraddresses/{useraddress}','AddressesController@destroy')->name('useraddresses.destroy');
        // to edit user address and go to form
        Route::get('/useraddresses/{useraddress}/edit','AddressesController@edit')->name('useraddresses.edit');
        // view specific address
        Route::get('/useraddresses/{useraddress}','AddressesController@show')->name('useraddresses.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
        //show all areas
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
//show all medicine
Route::get('/medicines','MedicineController@index')->name('medicines.index');
//create a medicine
Route::get('/medicines/create','MedicineController@create')->name('medicines.create');
//
Route::post('/medicines','MedicineController@store')->name('medicines.store');
//to edit a medicines
Route::get('/medicines/{medicine}/edit','MedicineController@edit')->name('medicines.edit');

Route::put('/medicines/{medicine}','MedicineController@update')->name('medicines.update');
//to delete a medicine
Route::delete('medicines/{medicine}','MedicineController@destroy')->name('medicines.destroy');
//to show only specific medicine
Route::get('/medicines/{medicine}','MedicineController@show')->name('medicines.show');

});

Route::get('/revenue','RevenueController@show')->name('revenue.show');

Route::get('/revenues','RevenueController@index')->name('revenue.index');


Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('pharmacy/trash','PharmacyController@trash')->name('pharmacy.trash');
        Route::get('pharmacy/restore/{pharmacy)','PharmacyController@restore')->name('pharmacy.restore');
});

Route::middleware(['auth', 'role:admin|owner'])->group(function () {
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
});


Route::middleware(['auth', 'role:admin'])->group(function () {
  //owners
  Route::get('/owners','OwnerController@index')->name('owners.index');
  //create new user
  Route::get('/owners/create','OwnerController@create')->name('owners.create');
  // store user data in db
  Route::post('/owners','OwnerController@store')->name('owners.store');
  // to update user info 
  Route::put('owners/{owner}','OwnerController@update')->name('owners.update');
  // to delete user
  Route::delete('owners/{owner}','OwnerController@destroy')->name('owners.destroy');
  // to edit user info 
  Route::get('/owners/{owner}/edit','OwnerController@edit')->name('owners.edit');
  // to show one user
  Route::get('/owners/{owner}','OwnerController@show')->name('owners.show');
});

Route::middleware(['auth', 'role:admin|owner'])->group(function () {
        //doctors
        Route::get('/doctors','DoctorsController@index')->name('doctors.index');
        //create new user
        Route::get('/doctors/create','DoctorsController@create')->name('doctors.create');
        // store user data in db
        Route::post('/doctors','DoctorsController@store')->name('doctors.store');
        // to update user info 
        Route::put('doctors/{user}','DoctorsController@update')->name('doctors.update');
        // to delete user
        Route::delete('doctors/{doctor}','DoctorsController@destroy')->name('doctors.destroy');
        // to edit user info 
        Route::get('/doctors/{doctor}/edit','DoctorsController@edit')->name('doctors.edit');
        // to show one user
        Route::get('/doctors/{doctor}','DoctorsController@show')->name('doctors.show');
        // to ban doctor 
        Route::get('/doctor/{doctor}','DoctorsController@banned')->name('doctors.banned');
});