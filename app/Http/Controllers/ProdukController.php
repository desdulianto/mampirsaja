<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

class ProdukController extends Controller
{
    public function show($kategori = null) {
        if ($kategori == null)
            $kategori = 'semua';
        $kategori_id = Kategori::select('id')->where('name', $kategori)->firstOrFail();
        if ($kategori == "semua")
            $produks = Produk::all();
        else
            $produks = Produk::where('kategori_id', $kategori_id->id)->get();
        $count = count($produks);
        return view('kategori', ['kategori'=>$kategori,
            'produks'=>$produks, 'count'=>$count]);
    }

    public function beli(Request $request, $produk_id) {
        $produk = Produk::find($produk_id);
        $session = $request->session();
        $session->push('cart', $produk);

        //return "beli produk " . $produk->nama;
        return redirect()->back()->with('alert-info',"Item $produk->nama sudah dimasukkan ke cart!");
    }
}
