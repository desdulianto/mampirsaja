<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    protected $table = 'toko';
    protected $fillable = ['user_id', 'nama', 'nama_bank', 'atas_nama', 'nomor_rekening', 'kota'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function produks() {
        return $this->hasMany('App\Produk');
    }
}
