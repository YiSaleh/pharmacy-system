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
})->name('home');

Auth::routes(['register' => false ,'verify' => true ]);
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home/create/{field}', 'HomeController@create')->name('home.create');
// Route::get('/home/{field}', 'HomeController@show')->name('home.show');

//user index
Route::get('/users','UserController@index')->name('users.index');
//create new user
Route::get('/users/create','UserController@create')->name('users.create');
// to show one user
Route::get('/users/{user}','UserController@show')->name('users.show');
// to delete user
Route::delete('users/{user}','UserController@destroy')->name('users.destroy');

//show all users addresses
Route::get('/useraddresses','AddressController@index')->name('useraddresses.index');
// create new user address
Route::get('/useraddresses/create','AddressController@create')->name('useraddresses.create');
// view specific address
Route::get('/useraddresses/{useraddress}','AddressController@show')->name('useraddresses.show');
// to delete user address
Route::delete('useraddresses/{useraddress}','AddressController@destroy')->name('useraddresses.destroy');







