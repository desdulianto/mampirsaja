<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';
    protected $fillable = ['tanggal', 'pesanan_id', 'bukti', 'total_bayar', 'konfirmasi'];

    public function pesanan() {
        return $this->belongsTo('App\Pesanan');
    }
}
