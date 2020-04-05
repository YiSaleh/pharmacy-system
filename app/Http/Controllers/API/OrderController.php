<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderController extends Controller
{
    //


    public function create() {
        $request=request();

       
        $order = new Order();
        $order->status = $request->input('order_status');
        $order->prescription = $request->input('prescription');
        $order->is_insured = $request->input('is_insured');
        $order->user_id = $request->input('user_id');
        $order->user_address_id = $request->input('user_address_id');
        $order->doctor_id = $request->input('dr_id');




        $order->save();
 
       //  return  o$order::all()/;
        
         return response()->json([
       'msg' => 'Order saved successfully!',
       'order' => $order,
       
   ]);
           
         }





    public function view($id)

    {
         
    	$order  = Order::firstWhere('id',$id);
    	return  response()->json([
            'order'=>$order
        ]);
    
    }


    public function update(Request $request,$id)
    {

        $order = Order::firstWhere('id',$id); 
        
        if(!$order || $order->status != "new"){
            return response()->json([
                'msg' => 'order cannot be updated',
            ]);
        }

        $order->prescription = $request->prescription;
        $order->is_insured = $request->is_insured;
        $order->user_address_id = $request->user_address_id;
        $order->doctor_id = $request->dr_id;
        $order->save();
     
        return response()->json([
        'msg' => 'order is updated succssfully!',
        'order' => $order,
      ]);
//-------------validation........

  }


  
    }


