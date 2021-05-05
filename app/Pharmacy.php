<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmacy extends Model
{
    use SoftDeletes;
	protected $fillable = [
        'name', 'periority' ,'area_id','owner_id',
    ];

   public function area()
    {
        return $this->belongsTo('App\Area');
    }

     public function user()
    {
        return $this->belongsTo('App\User')->where('id',$this->owner_id);
    }
}
