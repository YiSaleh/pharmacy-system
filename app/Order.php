<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'status', 'prescription','is_insured','user_address_id','pharmacy_id',
    ];

    public function user()
    {
        return $this->belongsToMany('App\User','user_order')->withTimestamps();
    }

    public function useraddress()
    {
        return $this->belongsTo('App\User_Address','user_address_id');
    }
    
    public function medicine()
    {
        return $this->belongsToMany('App\Medicine','order_medicine')->withPivot('quantity')->withTimestamps();
    }

    public function pharmacy()
    {
       return $this->belongsTo('App\Pharmacy','pharmacy_id');
    }

}
