<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsToMany('App\User','users_orders');
    }
    public function useraddress()
    {
        return $this->belongsTo('App\UserAddresses','user_address_id');
    }
    
    public function medicine()
    {
        return $this->belongsToMany('App\Medicine');
    }

    
    public function pharmacy()
    {
       return $this->belongsTo('App\Pharmacy');
    }
}
