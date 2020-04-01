<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddresses extends Model
{
    public $table = 'useraddresses';
    public $timestamps = false;
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
