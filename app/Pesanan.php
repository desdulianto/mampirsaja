<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ongkir;

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

    public function pembayaran() {
        return $this->hasOne('App\Pembayaran', 'pesanan_id');
    }

    public function konfirmasi() {
        $pembayaran = $this->pembayaran;

        return $pembayaran;
    }

    public function lunas() {
        // sudah dibayar dan dikonfirmasi oleh mampirsaja
        $pembayaran = $this->pembayaran;

        return $pembayaran->konfirmasi;
    }

    public function total_belanja($toko_id = null) {
        $total = 0;

        foreach ($this->items as $item) {
            if ($toko_id != null && $item->toko->id !== $toko_id)
                continue;
            $total += $item->qty * $item->harga;
        }
        return $total;
    }

    public function ongkir($toko_id = null) {
        $biaya = 0;

        foreach ($this->items as $item) {
            if ($toko_id != null && $item->toko->id !== $toko_id)
                continue;
            $toko = $item->toko;

            $ongkos = Ongkir::ongkir($toko->kota, $toko->propinsi, 
                $this->kota, $this->propinsi);

            $biaya += $ongkos * $item->berat * $item->qty;
        }
        return $biaya;
    }

    public function total($toko_id = null) {
        return $this->total_belanja($toko_id) + $this->ongkir($toko_id);
    }
}
