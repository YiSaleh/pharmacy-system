<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users','API\UserController@store')->middleware('auth:sanctum');


Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required'
         
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
     
     
     return response()->json(['User Info'=>$user,'Access Token'=>$user->createToken($request->device_name)->plainTextToken]);
});