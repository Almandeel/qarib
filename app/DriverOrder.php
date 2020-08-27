<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverOrder extends Model
{

    protected $fillable = [
        'warehouseorder_id', 'order_id' , 'driver_id', 'user_id', 'status', 'cod', 'bank'
    ];

    public function order() {
        return $this->belongsTo('App\Order', 'order_id');
    }
    
    public function warehouseOrder() {
        return $this->belongsTo('App\WarehouseOrder', 'warehouseorder_id');
    }

    public function driver() {
        return $this->belongsTo('App\Driver', 'driver_id');
    }

}
