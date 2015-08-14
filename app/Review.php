<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['toko_id', 'tanggal', 'produk_id', 
                    'user_id', 'review'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function produk() {
        return $this->belongsTo('App\Produk');
    }
}
