<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static $status_default       = 0;
    public static $status_in_warehouse  = 1;
    public static $status_in_drivers    = 2;
    public static $status_done          = 3;
    public static $status_schedule      = 4;
    public static $status_cancel        = 5;


    protected $fillable = [
        'customer', 'phone', 'address', 'status', 'amount', 'pyment_type', 'pyment_status', 'market_id',
        'receiver', 'receiver_address', 'receiver_phone', 'description', 'order_number', 'delivery_amount',
        'driver_amount', 'net'
    ];

    public function market() {
        return $this->belongsTo('App\Market', 'market_id');
    }

    public function warehouseOrder() {
        return $this->hasOne('App\WarehouseOrder');
    }

    public function driverOrders() {
        return $this->hasMany('App\DriverOrder');
    }

    public function BillOrder() {
        return $this->hasMany('App\BillOrder');
    }
}
