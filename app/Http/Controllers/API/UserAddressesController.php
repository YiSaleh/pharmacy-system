<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddressesController extends Controller
{  
    public function create()
    {
        $userAddress = UserAddress::create(Request()->all());
        return response()->json(['msg' => 'user saved successfully!', 'userAddresses' => $userAddress ]);            
    }
    
    public function view($userId)
    {
    	$userAddress  = UserAddress::firstWhere('user_id',$userId);
    	return  response()->json(['userAddress'=>$userAddress]);
    }

    public function update(Request $request,$userId)
	{		
        $request->validate(['street_name'=> 'required',
                            'floor_no'=>'required'
                            ]);
	    $userAddress = User_Address::firstWhere('user_id',$userId)->update($request->all());
        return response()->json(['msg' => 'user is updated succssfully!', 'userAddresses' => $userAddress ]);
    }
        
    public function delete(Request $request,$user_id )
    {
        $userAddress = User_Address::where('user_id',$user_id)->delete();
        
        if ($userAddress > 0) {
            return response()->json(['msg' => 'deleted succssfully!' , 'number of deleted addresses' => $userAddress ]);      
        }else
        {
            return response()->json(['msg' => 'nothing to delete' ]);
        }
    }
}