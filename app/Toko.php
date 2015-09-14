<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    protected $table = 'toko';
    protected $fillable = ['user_id', 'nama', 'nama_bank', 'atas_nama', 'nomor_rekening', 'kota', 'propinsi'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function produks() {
        return $this->hasMany('App\Produk');
    }

    public function pesanan_items() {
        return $this->hasMany('App\PesananDetails');
    }

    public function threads() {
        return $this->hasMany('App\Threads', 'toko_id');
    }

    public function aktif() {
        return $this->user->status() == 'Aktif';
    }
}
