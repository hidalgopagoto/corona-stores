<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    /**
     * @param string $name
     * @return string|null
     */
    public static function findByName(string $name): ?string
    {
        $setting = self::where('name', $name)->first();
        return $setting ? $setting->description : null;
    }
}
