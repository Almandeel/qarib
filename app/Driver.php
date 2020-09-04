<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name',	'phone', 'address',	'email', 'car', 'salary', 'commission', 'max_orders', 'status'
    ];

    public function orders() {
        return $this->hasMany('App\DriverOrder');
    }

    public function bills() {
        return $this->hasMany('App\Bill');
    }
}