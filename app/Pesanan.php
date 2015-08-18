<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = ['user_id', 'tanggal', 'nama', 'alamat', 'kota', 'propinsi', 
        'kode_pos', 'email', 'telepon', 'pembayaran_id'];

    public function items() {
        return $this->hasMany('App\PesananDetails', 'pesanan_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function lunas() {
        return $this->pembayaran_id != null;
    }
}
