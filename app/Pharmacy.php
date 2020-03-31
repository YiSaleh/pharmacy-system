<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
   public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
