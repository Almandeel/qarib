<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public static $receved_warehouse = 0;
    public static $receved_driver = 1;

    protected $fillable = [
        'name', 'orders', 'order_done' ,'amount', 'type', 'market_id', 'warehouse_id', 'driver_id', 'user_id', 'status'
    ];

    public function driver() {
        return $this->belongsTo('App\Driver', 'driver_id');
    }

    public function market() {
        return $this->belongsTo('App\Market', 'market_id');
    }

    public function warehouse() {
        return $this->belongsTo('App\Warehouse', 'warehouse_id');
    }

    public function billOrders() {
        return $this->hasMany('App\BillOrder');
    }

    
}
