<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Medicine;
use App\Order;
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
    public function create() 
    {
        $order = Order::create(Request()->all());
        $order->user()->create(request()->all());
        return response()->json(['msg' => 'Order saved successfully!', 'order' => $order ]);    
    }

    //TODO:// use joins
    public function view($id)
    {
      $order  = Order::firstWhere('id',$id);
      // $CustomOrder = DB::table('orders')->select('id as order_id', 'created_at','status')->where('id',$id)->get();
      
      $orderMedicines = Order_Medicine::where('order_id',$order->id)->get();
      $medicineIds =   Arr::pluck($orderMedicines, 'medicine_id');
      
      // $medicines = Medicine::find($medicineIds); // old but gold
      $medicines = DB::table('medicines')->select('name', 'type','price','quantity')->whereIn('id',$medicineIds)->get();

      // get array of medicine prices.
      $medicinesPrice = Arr::pluck($medicines,'price');
      //get array of medicine quantities.
      $orderMedicinesQuantity = Arr::pluck($orderMedicines,'quantity');
      
      // calculate order total price [ multiply 2 array of prices and quantites]
      $orderTotalPrice = 0;
      foreach ($medicinesPrice as $k => $v) {
        $orderTotalPrice += $v * ($orderMedicinesQuantity[$k] ?? 1);
      }
      //get pharmacy document
      $pharmacy = Pharmacy::firstWhere('id',$order->pharmacy_id);
      
      $orderDetails = array(
        'id'=> $order->id,
        'order_total_price'=>$orderTotalPrice,
        'ordered_at'=> $order->created_at,
        'status'=>$order->status,
        'medicines' => $medicines,
        'assigned_pharmacy'=> array('id'=>$pharmacy->id,'name'=>$pharmacy->name,'address'=>$pharmacy->area_id)
    );

    	return response()->json([
        'order_details'=>$orderDetails,
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
     
        return response()->json(['msg' => 'order is updated succssfully!','order' => $order ]);

  }


  
    }


