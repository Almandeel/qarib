<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'name'
    ];

    public function warehouseUsers() {
        return $this->hasMany('App\WarehouseUsers');
    }

    public function warehouseOrders() {
        return $this->hasMany('App\WarehouseOrder');
    }
}
