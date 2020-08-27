<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'phone', 'address', 'salary'
    ];


    public function user(){
        return $this->hasOne('App\User');
    }
}
