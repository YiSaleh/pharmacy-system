<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
   public function order()
    {
        return $this->belongsToMany('App\Order');
    }
    protected $fillable = [
        'name', 'price','quantity',
    ];
}
