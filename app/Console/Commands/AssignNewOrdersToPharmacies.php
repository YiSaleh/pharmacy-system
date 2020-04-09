<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Order;
use App\User_Address;
use App\Pharmacy;

class AssignNewOrdersToPharmacies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:new-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign new orders to the highest priority pharmacy';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $new_orders=Order::where('status','new')->get(); 
       foreach ($new_orders as $new_order ) {
           $user_address=User_Address::where('id',$new_order->user_address_id)->first();
           $pharmacy=Pharmacy::where('area_id',$user_address->area_id)->where('periority','High')->first();
           $new_order->pharmacy_id=$pharmacy->id;
           $new_order->status='processing';
           $new_order->save();
       } 
    }
}
