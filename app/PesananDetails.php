<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetails extends Model
{
    protected $table = 'pesanan_details';
    protected $fillable =  ['pesanan_id', 'produk_id', 'nama', 'harga', 'qty', 
        'berat', 'ongkir', 'toko_id' ] ;

    public function pesanan() {
        return $this->belongsTo('App\Pesanan');
    }

    public function produk() {
        return $this->belongsTo('App\Produk');
    }

    public function toko() {
        return $this->belongsTo('App\Toko');
    }
}
