<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    //
    public function create() {
             $request=request();


            //  dd($request->input('street_number'));
             $userAddress = new UserAddress();
             $userAddress->street_name=$request->input('street_number');
            //  $userAddress->description=$request->description;
            //  $userAddress->user_id=$request->user_id;
             $userAddress->save();
      
            //  return PostResource::collection(
            //     userAddress::all()
            //  );
         }


        // error_log('Some message here.');
        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'CA'
        // ]);
        
}
