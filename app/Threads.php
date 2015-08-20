<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    protected $table = 'threads';
    protected $fillable = ['pembeli_id', 'penjual_id', 'toko_id', 'pesanan_id', 'status'];

    public function pesanan() {
        return $this->hasOne('App\Pesanan');
    }

    public function pembeli() {
        return $this->hasOne('App\User');
    }

    public function penjual() {
        return $this->hasOne('App\User');
    }

    public function toko() {
        return $this->hasOne('App\User');
    }

    public function posts() {
        return $this->hasMany('App\Posts', 'thread_id');
    }
}
