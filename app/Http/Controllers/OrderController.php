<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use APP\User_Order;
use App\Medicine;
use App\Order_Medicine;
use App\Pharmacy;
use App\User_Address;
use Illuminate\Support\Facades\DB;

// use App\Http\Requests\StoreOderRequest;
// use App\Http\Requests\UpdateOrderRequest;


class OrderController extends Controller
{

    public function index()
    {
    $orders= Order::orderBy('created_at','asc')->with(['user','useraddress'])->paginate(5);
    dd($orders);
    return view('orders.index',['orders'=>$orders,]);
      

    }
    
    // public function autocomplete(Request $request)
    // {
    //     $data = Medicine::where("name","LIKE","%{$request->input('query')}%")->get();
    //     return response()->json($data);
        
    // }
    function autocomplete(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('medicines')
        ->where('name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }  

    public function show()
    {
    $order = Order::find(request()->order);

    return view('orders.show',[
        'order'=> $order,
    ]);
    }


    public function create()
    {
        return view('orders.create',[
            'users' => User::get(),
            'useraddresses'=>User_Address::get(),
            'pharmacies'=>Pharmacy::get(),
            'medicines'=>Medicine::get(),

            
            ]);

    }



    public function store()
    {   
        //   $r =  request();
        // dd($r);

        Order::create([
            'status' => request()->status,
            'prescription' => request()->prescription,
            'is_insured' => request()->is_insured ? true : false ,
            'created_at'=> request()->created_at,
            'updated_at'=> request()->updated_at,   
            'user_address_id'=>request()->user_address_id,
            'pharmacy_id'=>request()->pharmacy_id, 
            'medicines'=>Medicine::get(),
 
           
        ]);
     
        Order_Medicine::create([
            'order_id'=>request()->order_id,
            'medicine_id' =>request()->medicine_id,
            'quantity'=>request()->quantity
        ]);

       
        return redirect()->route('orders.index');
    }
    
    public function edit()
    {  
        // $r = request();
        // dd($r);

        return view('orders.edit',[
            'order' => Order::find(request()->order),
            'users' => User::get(),
            'useraddresses'=>User_Address::get(),
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


    public function delete(){
        $orderId =request()->order;
        $order=Order::find($orderId);
        $order->delete();
        return redirect()->route('orders.index');
     }


}
