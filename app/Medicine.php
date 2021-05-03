<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name', 'price','quantity','type'
    ];

   public function order()
    {
        return $this->belongsToMany('App\Order','order_medicine')->withPivot('quantity')->withTimestamps();
    }
  
    public function getPriceAttribute($price)
    {
        return $price / 100;
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = $price * 100;
    }

}
