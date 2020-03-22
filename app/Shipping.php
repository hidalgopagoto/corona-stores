<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';

    public function options()
    {
        return $this->hasMany('App\ShippingOption', 'id_shipping');
    }
}
