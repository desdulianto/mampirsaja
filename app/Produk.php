<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['toko_id', 'nama', 'kategori_id', 
                    'deskripsi', 'stock', 'harga', 'foto', 'berat'];

    public function toko() {
        return $this->belongsTo('App\Toko');
    }

    public function kategori() {
        return $this->belongsTo('App\Kategori');
    }

    public function pesanan_item() {
        return $this->hasMany('App\PesananDetails', 'produk_id');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function stockTersedia() {
        return $this->stock > 0;
    }
}
