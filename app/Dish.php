<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    function restaurant() {
        // Specify user_id as the foreign key
        return $this->belongsTo('App\User', 'user_id');
    }
    function order() {
        // TODO: Test that this works.
        return $this->hasMany('App\Order');
    }
}
