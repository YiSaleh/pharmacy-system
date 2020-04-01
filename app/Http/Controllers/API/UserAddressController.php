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
             $userAddress->user_id = $request->input('user_id');
             $userAddress->street_name = $request->input('street_name');
             $userAddress->building_no = $request->input('building_no');
             $userAddress->floor_no = $request->input('floor_no');
             $userAddress->flat_no = $request->input('flat_no');
             $userAddress->is_main = $request->input('is_main');
            //  $userAddress->description=$request->description;
            //  $userAddress->user_id=$request->user_id;
             $userAddress->save();
      
             return  userAddress::all();
             
         }


        // error_log('Some message here.');
        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'CA'
        // ]);
        
}
