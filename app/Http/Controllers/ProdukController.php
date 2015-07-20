<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function show($kategori = null) {
        if ($kategori == null)
            $kategori = 'Semua';
        return view('kategori', ['kategori'=>$kategori]);
    }
}
