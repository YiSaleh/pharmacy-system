<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy;
use App\Order;

class RevenueController extends Controller
{
    public function show()
    {
        $userId=auth()->user()->id;
        $pharmacy_id=Pharmacy::where('owner_id',$userId)->value('id');
        $orders=Order::where([
            ['pharmacy_id', '=', $pharmacy_id],
            ['status', '=', 'delivered'],
        ])->value('id');

        foreach ($orders as $key => $value) {
            # code...
        }

     }

    public function index(){

    }
}
