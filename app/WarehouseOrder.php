<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseOrder extends Model
{
    protected $table = 'warehouse_orders';
    protected $fillable = ['order_id', 'user_id', 'status', 'warehouse_id', 'schedule_at'];


    public function order() {
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function driverOrders() {
        return $this->hasMany('App\DriverOrder', 'warehouseorder_id');
    }

    public function warehouse() {
        return $this->belongsTo('App\Warehouse', 'warehouse_id');
    }
}
