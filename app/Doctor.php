<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }
}
