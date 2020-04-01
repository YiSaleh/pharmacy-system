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
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/create/{field}', 'HomeController@create')->name('home.create');
Route::get('/home/{field}', 'HomeController@show')->name('home.show');

//user addresses
// Route::post('/user-address/create', 'UserAddressController@create')->name('userAddress.create');



