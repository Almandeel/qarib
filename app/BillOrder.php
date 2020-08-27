<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillOrder extends Model
{
    protected $fillable = [
        'bill_id', 'order_id', 'status'
    ];

    public function order() {
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function bill() {
        return $this->belongsTo('App\Bill', 'bill_id');
    }
}
