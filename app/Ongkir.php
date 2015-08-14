<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    protected $table = 'ongkir';
    protected $fillable = ['kota_asal', 'propinsi_asal', 'kota_tujuan', 
                    'propinsi_tujuan', 'ongkos'];
}
