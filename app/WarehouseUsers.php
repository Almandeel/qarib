<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseUsers extends Model
{
    protected $table = 'warehouse_users';
    protected $fillable = ['user_id', 'warehouse_id'];


    public function user() {
        return $this->belongsTo('App\User');
    }


    public function warehouse() {
        return $this->belongsTo('App\Warehouse', 'warehouse_id');
    }
}
