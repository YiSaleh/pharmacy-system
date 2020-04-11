<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
   public function order()
    {
        return $this->belongsToMany('App\Order');
    }
  
    public function getPriceAttribute($price)
{
    return $price / 100;
}

public function setPriceAttribute($price)
{
    $this->attributes['price'] = $price * 100;
}

protected $fillable = [
        'name', 'price','quantity','type'
    ];
}
