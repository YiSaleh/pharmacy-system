<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Spatie\Permission\Models\Role;

class User extends Authenticatable implements MustVerifyEmail ,BannableContract
//  BannableContract
{
     use HasApiTokens, Notifiable, HasRoles ,Bannable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'name', 'email','avatar',
                    'password', 'is_banned',
                    'phone','date_of_birth',
                    'national_id','gender' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsToMany('App\Order','user_order')->withTimestamps();
    }

    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }
    
}
