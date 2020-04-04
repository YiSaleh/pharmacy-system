<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class UserAddresses extends Model
{
    use SoftDeletes;
    public $table = 'useraddresses';
    public $timestamps = false;
    public function User()
    {   
        return $this->belongsTo('App\User');
 
    }



}
