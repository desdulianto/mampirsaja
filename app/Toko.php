<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    protected $table = 'toko';
    protected $fillable = ['user_id', 'nama', 'nama_bank', 'atas_nama', 'nomor_rekening'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
