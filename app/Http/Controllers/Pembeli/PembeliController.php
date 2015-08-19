<?php

namespace App\Http\Controllers\Pembeli;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Pesanan;
use App\Pembayaran;
use File;

class PembeliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function uniqueFilename($name, $ext) {
        $output = $name;
        $basename = basename($name, '.' . $ext);
        $i = 2;
        while(File::exists('uploads/bukti' . '/' . $output)) {
            $output = $basename . $i . '.' . $ext;
            $i ++;
        }
        return $output;
    }

    public function orders(Request $request) {
        $user = $request->user();

        if ($user->role != "pembeli")
            abort(404);

        $orders = Pesanan::where('user_id', $user->id)->get();

        return view('pembeli.orders', ['orders'=>$orders, 'use_id'=>$user->id]);
    }

    protected function validator_bukti(array $data) {
        return Validator::make($data, [
                'bukti' => 'required|image'
            ]);
    }

    public function confirmPembayaran(Request $request) {
        $user = $request->user();
        $order_id = $request->id;

        if ($user->role != "pembeli")
            abort(404);

        $order = Pesanan::where('id', $order_id)->first();

        if ($order->count() == 0)
            abort(404);

        if ($order->lunas())
            return redirect()->route('home')->with('alert-info', 'Pemesanan sudah lunas');

        if ($request->isMethod('post')) {
            $validator = $this->validator_bukti($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }

            $dstPath = 'uploads/bukti';
            $name = $request->file('bukti')->getClientOriginalName();
            $ext  = $request->file('bukti')->getClientOriginalExtension();
            $file = $this->uniqueFileName($name, $ext);
            $request->file('bukti')->move($dstPath, $file);
            $data['bukti'] = $file;

            $pembayaran = new Pembayaran(['tanggal'    =>date('Y-m-d'),
                                'bukti'      =>$file,
                                'total_bayar'=>$order->total()]);

            $pembayaran = $order->pembayaran()->save($pembayaran);
            $order->pembayaran_id = $pembayaran->id;
            $order->save();

            return redirect()->route('pembeliOrders')->with('alert-info', 'Konfirmasi pembayaran telah disimpan');
        } else 
            return view('pembeli.confirmPembayaran', ['id'=>$order->id, 'order'=>$order]);
    }

}
