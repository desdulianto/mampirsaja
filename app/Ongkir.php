<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    protected $table = 'ongkir';
    protected $fillable = ['kota_asal', 'propinsi_asal', 'kota_tujuan', 
                    'propinsi_tujuan', 'ongkos'];

    public static function ongkir($kota_asal, $propinsi_asal, $kota_tujuan, $propinsi_tujuan) {
        $ongkos = Ongkir::select('ongkos')
            ->where('kota_asal', $kota_asal)
            ->where('propinsi_asal', $propinsi_asal)
            ->where('kota_tujuan', $kota_tujuan)
            ->where('propinsi_tujuan', $propinsi_tujuan)->first();
        return $ongkos->ongkos;
    }
}
