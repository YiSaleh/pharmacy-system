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


Route::group(['middleware'=>'auth'],function(){
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

Route::group(['middleware'=>'auth'],function(){
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





