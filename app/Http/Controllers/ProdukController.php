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

    public function produkExist(Request $request, $produk_id)
    {
        $pos = -1;
        $session = $request->session();
        $cart = $session->get('cart', []);
        if (count($cart) == 0)
            return $pos;
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['produk']['id'] == $produk_id) {
                $pos = $i;
                break;
            }
        }

        return $pos;
    }

    public function beli(Request $request, $produk_id) {
        $produk = Produk::find($produk_id);
        $session = $request->session();
        $n = $this->produkExist($request, $produk_id);
        if ($n < 0) {
            $session->push('cart', ['produk'=>$produk, 'qty'=>1]);
        } else {
            $item = $session->get("cart.$n");
            $item['qty'] = $item['qty'] + 1;
            $session->put("cart.$n",  $item);
        }

        return redirect()->back()->with('alert-info',"Item $produk->nama sudah dimasukkan ke cart!");
    }
}
