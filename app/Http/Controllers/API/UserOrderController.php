<?php

namespace App\Http\Controllers\API;
use Illuminate\Database\Eloquent\Model;
use App\User_Order;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserOrderController extends Controller
{
 
    public function viewUserOrders($user_id)
    {             
        $orders  = User_Order::where('user_id',$user_id)->pluck('order_id');
        $userOrders = Order::find($orders);
        return  response()->json(['user_orders'=>$userOrders]); 
    }

    public function viewOrder($order_id){
        $order  =User_Order::firstWhere('order_id',$order_id);
    	return  response()->json(['order'=>$order ]);

    }
    
    }
 

