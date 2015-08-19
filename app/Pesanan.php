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

        if ($pembayaran != null)
            return $pembayaran->konfirmasi;
        return false;
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

    public function banyak_items($toko_id = null) {
        $banyak = 0;

        foreach ($this->items as $item) {
            if ($toko_id != null && $item->toko->id != $toko_id)
                continue;
            $banyak += $item->qty;
        }

        return $banyak;
    }

    public function items_terkirim($toko_id = null) {
        $banyak = 0;

        foreach ($this->items as $item) {
            if ($toko_id != null && $item->toko->id != $toko_id)
                continue;

            if ($item->bukti_kirim != null)
                $banyak += $item->qty;
        }
        return $banyak;
    }

    public function sudah_terkirim($toko_id) {
        $terkirim = true;

        foreach ($this->items as $item) {
            if ($item->toko_id == $toko_id &&
                $item->bukti_kirim == null) {
                $terkirim = false;
                break;
            }
        }

        return $terkirim;
    }

    public function update_kirim() {
        $terkirim = true;

        foreach ($this->items as $item) {
            if ($item->bukti_kirim == null) {
                $terkirim = false;
                break;
            }
        }

        $this->terkirim = $terkirim;
        $this->save();
    }
}
