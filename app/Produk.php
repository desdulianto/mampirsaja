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

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function kategori() {
        return $this->belongsTo('App\Kategori');
    }
}
