<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' ,'phone', 'password', 'address', 'email','status', 'driver_id', 'market_id'
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



    public function warehouses() {
        return $this->hasMany('App\WarehouseUsers');
    }

    public function driver() {
        return $this->belongsTo('App\Driver', 'driver_id');
    }

    public function market() {
        return $this->belongsTo('App\Market', 'market_id');
    }
}
