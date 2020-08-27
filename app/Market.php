<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = [
        'name', 'password', 'email', 'delivery_cost',
    ];
}
