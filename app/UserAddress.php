<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public $table = 'useraddresses';
    public $timestamps = false;
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
