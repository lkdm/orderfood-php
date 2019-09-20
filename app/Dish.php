<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    function restaurant() {
        return $this->belongsTo('App\User');
    }
    function order() {
        return $this->belongsTo('App\Order');
    }
}
