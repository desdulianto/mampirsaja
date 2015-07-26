<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['name', 'label'];

    public function produks() {
        return $this->hasMany('App\Produk');
    }
}
