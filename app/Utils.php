<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utils extends Model
{
    /**
     * @param string $value
     * @return float
     */
    public static function toDbCurrency(string $value): float
    {
        return (float)str_replace(",", ".", str_replace(".", "", $value));
    }
}
