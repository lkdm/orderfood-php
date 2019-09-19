<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function manufacturer() {
        return $this->belongsTo('App\Manufacturer');
    }
}
