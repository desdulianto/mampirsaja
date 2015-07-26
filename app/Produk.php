<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['user_id', 'toko_id', 'nama', 'tipe', 'kategori_id', 
                    'deskripsi', 'stock', 'harga'];

    public function toko() {
        return $this->belongsTo('App\Toko');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function kategori() {
        return $this->belongsTo('App\Kategori');
    }
}
