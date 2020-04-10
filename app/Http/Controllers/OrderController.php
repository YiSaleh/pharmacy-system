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

    $orders= Order::orderBy('created_at','desc')->with(['user','useraddress'])->paginate(5);
    // dd($orders->pluck('user'));
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
       <li><a href="#">'.$row->name.' '.$row->price.'</a></li>
       ';
      }
      $output .= '</ul>';

      echo $output;
     }
    }  
    
    // function insert(Request $request)
    // {
    //  if($request->ajax())
    //  {
    //   $rules = array(
    //    '.*'  => 'required',
    //    'last_name.*'  => 'required'
    //   );
    //   $error = Validator::make($request->all(), $rules);
    //   if($error->fails())
    //   {
    //    return response()->json([
    //     'error'  => $error->errors()->all()
    //    ]);
    //   }

    //   $first_name = $request->first_name;
    //   $last_name = $request->last_name;
    //   for($count = 0; $count < count($first_name); $count++)
    //   {
    //    $data = array(
    //     'first_name' => $first_name[$count],
    //     'last_name'  => $last_name[$count]
    //    );
    //    $insert_data[] = $data; 
    //   }

    //   DynamicField::insert($insert_data);
    //   return response()->json([
    //    'success'  => 'Data Added successfully.'
    //   ]);
    //  }
    // }
    
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
            Medicine::where('name','like',request()->name)->first()
 
           
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
           
            //    $r=(Order_Medicine::where('order_id',request()->order));
            //    dd($r)->medicine_id;
               

        return view('orders.edit',[
            'orders'=>Order::find(request()->order),
            'order_medicines' => Order_Medicine::where('order_id',request()->order->get()),
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


    public function destroy(){
        $orderId =request()->order;
        $order=Order::find($orderId);
        $order->delete();
        return redirect()->route('orders.index');
     }


}
