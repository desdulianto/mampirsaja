<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Review;
use Validator;

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

        return redirect()->back()->with('alert-info',"Item $produk->nama sudah dimasukkan ke keranjang.");
    }


    public function detail($produk_id) {
        $produk = Produk::findOrFail($produk_id);

        return view('produk', ['produk'=>$produk]);
    }

    protected function validator_review(array $data)
    {
        return Validator::make($data, [
            'tanggal'     => 'required',
            'produk_id'   => 'required|exists:produk,id',
            'review'      => 'required|max:255',
        ]);
    }

    protected function createReview(array $data) {
        return Review::create([
            'tanggal'   => $data['tanggal'],
            'user_id'   => $data['user_id'],
            'produk_id' => $data['produk_id'],
            'review'    => $data['review'],
            ]);
    }

    public function review(Request $request, $produk_id) {
        $user = $request->user();

        if ($user)
            $user_id = $user->id;
        else
            $user_id = null;

        $request->merge(['user_id'=>$user_id, 'produk_id'=>$produk_id, 
            'tanggal'=>date('Y-m-d')]);

        $validator = $this->validator_review($request->all());

        if ($validator->fails()) {
            $this->throwValidationException (
                $request, $validator
            );
        }

        $this->createReview($request->all());

        return redirect()->route('detailProduk', ['id'=>$produk_id])->with('alert-info', 'Review telah disimpan');
    }
}
