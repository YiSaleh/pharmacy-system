<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Medicine;
use App\Order;
use App\Order_Medicine;
use App\Pharmacy;
use App\User_Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    //


    public function create() {
        $request=request();

       
        $order = new Order();
        $order->status = $request->input('order_status');
        $order->prescription = $request->input('prescription');
      //   if ($order->file('prescription')->isValid()) {
      //     $order->prescription->store('uploads','public');
      // }         
      
        $order->is_insured = $request->input('is_insured');
        $order->user_address_id = $request->input('user_address_id');
        $order->pharmacy_id = $request->input('pharmacy_id');


        $order->save();
      
        $userOrder = new User_Order(); 
        $userOrder->user_id = $request->input('user_id');//user_order table
        $userOrder->order_id = $request->input('order_id');//user_order table

        $userOrder->save();
        
 
       //  return  o$order::all()/;
        
         return response()->json([
       'msg' => 'Order saved successfully!',
       'order' => $order,
       
   ]);
           
         }





    public function view($id)

    {
      $order  = Order::firstWhere('id',$id);
      $CustomOrder = DB::table('orders')->select('id as order_id', 'created_at','status')->where('id',$id)->get();

      $orderMedicines = Order_Medicine::where('order_id',$order->id)->get();
      $medicineIds =   Arr::pluck($orderMedicines, 'medicine_id');

      $medicines = Medicine::find($medicineIds);

      // $filteredMedicines = Arr::only($medicines, ['type', 'quantity']);

      // $medicinesDetails = Arr::pluck($medicines, 'name','type','quantity');
      $pharmacy = Pharmacy::firstWhere('id',$order->pharmacy_id);

      $orderDetails = array(
        'order_id'=> $order->id,
        'ordered_at'=> $order->created_at,
        'status'=>$order->status,
        'medicines' => $medicines,
        'assigned_pharmacy'=> array('id'=>$pharmacy->id,'name'=>$pharmacy->name,'address'=>$pharmacy->area_id)
    );

      // $orderDetails->order_id = $order->id;
    	return response()->json([
        'order_details'=>$orderDetails,
            // 'order'=>$order,
            // 'userOrders'=>$orderMedicines,
            // 'ids'=>$medicineIds ,
            // 'medicines'=>$medicines,
            // 'pharmacy'=>$pharmacy
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


