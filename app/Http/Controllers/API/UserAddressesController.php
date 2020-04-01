<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use App\UserAddress;
use App\UserAddresses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserAddressesController extends Controller
{
    
    public function create() {
             $request=request();


            //  dd($request->input('street_number'));
             $userAddress = new UserAddresses();
             $userAddress->user_id = $request->input('user_id');
             $userAddress->street_name = $request->input('street_name');
             $userAddress->building_no = $request->input('building_no');
             $userAddress->floor_no = $request->input('floor_no');
             $userAddress->flat_no = $request->input('flat_no');
             $userAddress->is_main = $request->input('is_main');
            //  $userAddress->description=$request->description;
            //  $userAddress->user_id=$request->user_id;
             $userAddress->save();
      
            //  return  userAddress::all()/;
             
              return response()->json([
            'msg' => 'user saved successfully!',
            'userAddresses' => $userAddress,
            
        ]);
                
              }
    
         public function view($user_id)
    {
    	// $request  = request();
    	// $user_id = $request->user_id;    
    	$userAddress  = UserAddresses::firstWhere('user_id',$user_id);
    	return  response()->json([
            'userAddress'=>$userAddress
        ]);
    
    }

        // error_log('Some message here.');
        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'CA'
        // ]);

        public function update(Request $request)
		{
			$validatedData = $request->validate([
				'user_id'=> [
					'required',
					// this to force the unique contraint to stop if the same object is being updated
					Rule::unique('userAddress')->ignore($request->userAddress),
			],
       
    ]);
			$user_id = $request->userAdress;
			$userAddress = UserAddresses::firstWhere($user_id);
			$userAddress->user_id = $request->user_id;
			$userAddress->street_name = $request->street_name;
			$userAddress-> street_number= $request->street_number;
			$userAddress->save();
		 
            return response()->json([
          'msg' => 'user is updated succssfully!',
          'userAddresses' => $userAddress,
          
      ]);
		}

}
        

