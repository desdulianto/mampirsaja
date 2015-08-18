<?php

namespace App\Http\Controllers\Pembeli;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pesanan;

class PembeliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orders(Request $request) {
        $user = $request->user();

        if ($user->role != "pembeli")
            abort(404);

        $orders = Pesanan::where('user_id', $user->id)->get();

        return view('pembeli.orders', ['orders'=>$orders, 'use_id'=>$user->id]);
    }

}
