<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class UserAddresses extends Model
{
    use SoftDeletes;
    public $table = 'useraddresses';
    public $timestamps = false;
  
    protected $fillable = [
        'street_name', 'flat_no', 'floor_no', 'building_no' , 'user_id' , 'is_main'
    ];

    public function User()
    {   
        return $this->belongsTo('App\User');
 
    }

    

}
