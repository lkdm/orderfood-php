<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function dish() {
        return $this->hasMany('App\Dish');
    }
}
