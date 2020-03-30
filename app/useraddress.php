<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class useraddress extends Model
{
    
    public function pharmacyusers()
    {
        return $this->belongsTo('App\pharmacyusers');
    }
}
