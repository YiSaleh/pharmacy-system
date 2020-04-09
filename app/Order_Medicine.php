<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Medicine extends Model
{
    public $table = 'orders_medicines';
    protected $fillable = [
        'order_id', 'medicine_id','quantity',
    ];
}
