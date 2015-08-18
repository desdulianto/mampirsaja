<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pesanan;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orders(Request $request) {
        $orders = Pesanan::get();

        return view('admin.orders', ['orders'=>$orders]);
    }

    public function checkPembayaran(Request $request) {
        $order_id = $request->id;
        $order = Pesanan::find($order_id)->first();

        if ($order == null)
            abort(404);

        if ($request->isMethod('post')) {
            $pembayaran = $order->pembayaran;
            if ($pembayaran == null)
                abort(404);
            $pembayaran->konfirmasi = true;
            $pembayaran->save();

            return redirect()->route('adminOrders')->with('Pembayaran sudah dikonfirmasi!');
        } else
            return view('admin.checkPembayaran', ['order'=>$order]);
    }
}
