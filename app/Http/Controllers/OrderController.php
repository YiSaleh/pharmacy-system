<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
// use App\Http\Requests\StoreOderRequest;
// use App\Http\Requests\UpdateOrderRequest;


class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy('created_at','desc')->paginate(5);
        return view('orders.index', compact('orders'))
        ->with('i',(request()->input('page',1) -1) * 5);
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
        $users = User::all();
        return view('orders.create',['users' => $users]);

    }

    // public function store(StoreOrderRequest $request)
    // {
    //     Order::create([
    //         'title'=>$request->title,
    //         'description'=>$request->description,
    //         'user_id' => $request->user_id,
    //     ]);
    //     return redirect()->route('posts.index');
    // }





    public function delete(){
        $orderId =request()->order;
        $order=Order::find($orderId);
        $order->delete();
        return redirect()->route('orders.index');
     }


}
