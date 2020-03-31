<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function useraddress()
    {
        return $this->belongsTo('App\UserAddress');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
    public function medicine()
    {
        return $this->belongsToMany('App\Medicine');
    }
}
