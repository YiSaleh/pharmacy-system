<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Medicine;
use App\Pharmacy;
use App\UserAddress;

use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{

    public function index()
    {
        $orders= Order::orderBy('created_at','desc')->with(['user','useraddress'])->paginate(5);
        return view('orders.index',['orders'=>$orders]);
    }

    function autocomplete(Request $request)
    {
     if($request->get('query'))
     {
        $query = $request->get('query');
        $data = Medicine::where('name', 'LIKE', "%{$query}%")->get();
        $output = '<ul class="dropdown-menu col-md-12" style="display:block; position:relative">';
        foreach($data as $medicine)
        {
            $output .= '<li class="px-4" value="'.$medicine->id .'">'.$medicine->name.'</li>';
        }
        $output .= '</ul>';
        echo $output;
        }
    }  
    
    
    public function show()
    {
        $order = Order::find(request()->order);
        return view('orders.show',['order'=> $order]);
    }

    public function create()
    {     
        $order=Order::find(request()->order);
        return view('orders.create',['order'=>$order,
            'users'=>User::role('user')->get(),
            'addresses'=>UserAddress::get(),
            'medicines'=>Medicine::get(),
            ]);
    }

    public function store()
    {  
       $order = Order::create([
            'status' => 'waiting',
            'user_address_id'=>request()->user_address_id,
        ]);

        $order->medicine()->createMany(request()->medicine);
        return redirect()->route('orders.index');
    }
    
    public function edit()
    {  
       return view('orders.edit',[
            'orders'=>Order::find(request()->order),
            // 'order_medicines' => Order_Medicine::where('order_id',request()->order->get()),
            'users' => User::get(),
            'useraddresses'=>UserAddress::get(),
            'pharmacies'=>Pharmacy::get(),
        ]);
    }

    public function update()
    {
        Order::find(request()->order)->update([
            'status' => request()->status,
            'prescription' => request()->prescription,
            'is_insured' => request()->is_insured ? true : false ,
            'created_at'=> request()->created_at,
            'updated_at'=> request()->updated_at,   
            'user_address_id'=>request()->user_address_id,
            'pharmacy_id'=>request()->pharmacy_id,  
        ]);
        return redirect()->route('orders.index');
        }


    public function destroy()
    {
        $order=Order::find(request()->order);
        if($order->status === 'canceled' || $order->status === 'delivered')
        { $order->delete(); }
        return redirect()->route('orders.index');
     }

}
