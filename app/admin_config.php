<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_config extends Model
{
    protected $table = 'admin_configs';
    protected $fillable = ['property', 'value'];

    public static function get_configs() {
        $config = [];

        foreach (admin_config::get() as $row) {
            $config[$row['property']] = $row['value'];
        }
        return $config;
    }
}
