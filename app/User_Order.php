<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Order extends Model
{    public $table = 'users_orders';

    protected $fillable = [
        'order_id', 'user_id',
    ];
}
