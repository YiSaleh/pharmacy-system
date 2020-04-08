<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\UserAddresses;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
        // $model = App\Flight::findOrFail(1);

        // $model = App\Flight::where('legs', '>', 100)->firstOrFail();
    	// $request  = request();
        // $user_id = $request->user_id;  
    	$userAddress  = UserAddresses::firstWhere('user_id',$user_id);
    	return  response()->json([
            'userAddress'=>$userAddress
        ]);
    
    }


        public function update(Request $request,$user_id)
		{
			
			$userAddress = UserAddresses::firstWhere('user_id',$user_id);
			// $userAddress->user_id = $request->user_id;
			$userAddress->street_name = $request->street_name;
            $userAddress->building_no= $request->building_no;
            $userAddress->floor_no= $request->floor_no;
            $userAddress->flat_no= $request->flat_no;
            $userAddress->is_main= $request->is_main; 


            $validatedData = $request->validate([
				'street_name'=> [
					'required'
					// // ,this to force the unique contraint to stop if the same object is being updated
					// Rule::unique('useraddresses')->ignore($request->$userAddress)
                ],'floor_no'=>'required'
       
    ]);
			

			$userAddress->save();
		 
            return response()->json([
          'msg' => 'user is updated succssfully!',
          'userAddresses' => $userAddress,
          
      ]);
        }
        

        public function delete(Request $request,$user_id ){

           $userAddress = UserAddresses::where('user_id',$user_id)->delete();
        
           if ($userAddress > 0) {
            return response()->json([
                'msg' => 'deleted succssfully!',
                'number of deleted addresses' => $userAddress,
                ]);
                
        }else {
            return response()->json([
                'msg' => 'nothing to delete',
                
                ]);
                
                };
//       if ($userAddress->trashed()) {
        // $userAddress = UserAddresses::withTrashed()->where('user_id',$user_id)->get();
        // $userAddress = UserAddresses::onlyTrashed()->get();
        // $response = $this->successfulMessage(200, 'Successfully', true, $userAddress->count(), $userAddress);
       


        }

}
        

