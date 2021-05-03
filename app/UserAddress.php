<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class UserAddress extends Model
{
    public $table = 'user_addresses';
    public $timestamps = false;
  
    protected $fillable = [
        'street_name', 'flat_no', 'floor_no', 'building_no' , 'user_id' , 'is_main' , 'area_id'
    ];

    public function User()
    {   
        return $this->belongsTo('App\User');
    }

    public function area()
    {   
        return $this->belongsTo('App\Area');
    }

}
