<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Mail;

use App\Propinsi;
use App\Produk;
use App\Ongkir;
use App\Pesanan;
use App\PesananDetails;
use App\admin_config;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $session = $request->session();
        $cart = $session->get('cart', []);
        if (count($cart) == 0) {
            $session->forget('cart');
            return redirect()->route('root');
        }
        $items = 0;
        $total = 0;
        foreach ($session->get('cart') as $item) {
            $items += $item['qty'];
            $total += $item['produk']['harga'] * $item['qty'];
        }
        return view('cart', ['cart'=>$cart, 'total_items'=>$items, 'total'=>$total]);
    }

    public function del(Request $request, $index)
    {
        $session = $request->session();
        $session->forget('cart.' . $index);
        $cart = $session->get('cart', []);
        if (count($cart) == 0) {
            $session->forget('cart');
            return redirect()->route('root');
        }
        return redirect()->route('cart');
    }

    public function increase(Request $request, $index)
    {
        $session = $request->session();
        $cart = $session->get('cart', []);
        if (count($cart) == 0) {
            $session->forget('cart');
            return redirect()->route('root');
        }
        $item = $session->get("cart.$index", null);
        if ($item != null) {
            $item['qty'] = $item['qty'] + 1;
            $session->put("cart.$index", $item);
        }

        return redirect()->route('cart');
    }

    public function decrease(Request $request, $index)
    {
        $session = $request->session();
        $cart = $session->get('cart', []);
        if (count($cart) == 0) {
            $session->forget('cart');
            return redirect()->route('root');
        }
        $item = $session->get("cart.$index", null);
        if ($item != null) {
            $item['qty'] = $item['qty'] - 1;
            $session->put("cart.$index", $item);

            if ($item['qty'] == 0) {
                return redirect()->route('delCart', ['index'=>$index]);
            }
        }

        return redirect()->route('cart');
    }

    public function checkout(Request $request)
    {
        $session = $request->session();
        $cart = $session->get('cart', []);

        // kota dan propinsi
        $daftar_kota = Propinsi::select('kota')->distinct()->
                    orderBy('kota', 'asc')->lists('kota', 'kota');
        $daftar_propinsi = Propinsi::select('propinsi')->distinct()->
            orderBy('propinsi', 'asc')->lists('propinsi', 'propinsi');

        if (Auth::check()) {
            $nama = '';
            $alamat = '';
            $kota = '';
            $propinsi = '';
            $kode_pos = '';
            $email = '';
            $telepon = '';
            $user = Auth::user();
            if ($user->info()) {
                $nama = $user->nama_lengkap();
                $alamat = $user->info->alamat;
                $kota = $user->info->kota;
                $propinsi = $user->info->propinsi;
                $kode_pos = $user->info->kode_pos;
                $email = $user->email;
                $telepon = $user->info->telepon;
            }
            return view('checkout', ['cart'=>$cart, 'daftar_kota'=>$daftar_kota, 'daftar_propinsi'=>$daftar_propinsi,
                'nama'=>$nama, 'alamat'=>$alamat, 'kota'=>$kota, 'propinsi'=>$propinsi, 'kode_pos'=>$kode_pos,
                'email'=>$email, 'telepon'=>$telepon]);
        } else {
            return view('auth.login_or_register', ['redir'=>'checkout']);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama'        => 'required|max:255',
            'alamat'      => 'required|max:255',
            'kota'        => 'required|exists:propinsi',
            'propinsi'    => 'required|exists:propinsi',
            'kode_pos'    => 'required|max:50',
            'email'       => 'required|email',
            'telepon'     => 'required',
        ]);
    }

    public function biayaXHR(Request $request)
    {
        $session = $request->session();
        $kota = $request->kota;
        $propinsi = $request->propinsi;
        $cart = $session->get('cart', []);

        $totalOngkir = 0;
        $totalBelanja = 0;

        foreach ($cart as $item) {
            $toko = Produk::find($item['produk']->id)->toko;
            $produk = Produk::find($item['produk']->id);
            $qty = $item['qty'];
            $kotaAsal = $toko->kota;
            $propinsiAsal = $toko->propinsi;
            $ongkir = Ongkir::select('ongkos')->
                where('kota_asal', $kotaAsal)->
                where('propinsi_asal', $propinsiAsal)->
                where('kota_tujuan', $kota)->
                where('propinsi_tujuan', $propinsi)->first();
            if ($ongkir == null)
                $ongkir = -1;
            else
                $ongkir = $ongkir->ongkos;
            $totalBelanja += $produk->harga * $qty;
            $totalOngkir += $produk->berat * $qty * $ongkir;
        }

        return json_encode(['ongkir'=>$totalOngkir, 'total_belanja'=>$totalBelanja]);
    }

    public function confirmOrder(Request $request) {
        $session = $request->session();
        $cart = $session->get('cart', []);
        $kota = $request->kota;
        $propinsi = $request->propinsi;

        $total = json_decode($this->biayaXHR($request));

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $items = [];
        foreach ($cart as $item) {
            $toko = Produk::find($item['produk']->id)->toko;
            $produk = Produk::find($item['produk']->id);
            $qty = $item['qty'];
            $kotaAsal = $toko->kota;
            $propinsiAsal = $toko->propinsi;
            $ongkir = Ongkir::select('ongkos')->
                where('kota_asal', $kotaAsal)->
                where('propinsi_asal', $propinsiAsal)->
                where('kota_tujuan', $kota)->
                where('propinsi_tujuan', $propinsi)->first();
            if ($ongkir == null)
                $ongkir = -1;
            else
                $ongkir = $ongkir->ongkos;

            array_push($items, ['produk_id'=>$produk->id, 'nama'=>$produk->nama,
                'harga'=>$produk->harga, 'berat'=>$produk->berat,
                'qty'=>$qty, 'ongkir'=>$ongkir, 'toko_id'=>$toko->id]);
        }

        
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $data['items'] = $items;
        $order = $this->createPesanan($data);

        $request->session()->forget('cart');
        $request->session()->regenerate();

        $config = admin_config::get_configs(); 

        $cara_pembayaran = str_replace(['$nama', '$no_rekening', '$bank'],
                                       [$config['nama'], $config['no_rekening'], $config['bank']],
                                       $config['cara_pembayaran']);

        $params = ['order'=>$order, 'total'=>$total, 'cara_pembayaran'=>$cara_pembayaran];
        // kirim invoice
        Mail::send('invoice', $params, function($pesan) use ($order) {
                    $pesan->to($order->email, $order->nama)->subject('Invoice Order ' . $order->id);
        });

        return view('invoice', $params);
    }

    protected function createPesanan($data) {
        $pesanan = Pesanan::create([
            'tanggal' =>date('Y-m-d'),
            'user_id' =>$data['user_id'],
            'nama'    =>$data['nama'],
            'alamat'  =>$data['alamat'],
            'kota'    =>$data['kota'],
            'propinsi'=>$data['propinsi'],
            'kode_pos'=>$data['kode_pos'],
            'telepon' =>$data['telepon'],
            'email'   =>$data['email'],
            ]);

        $items = [];
        foreach ($data['items'] as $item) {
            array_push($items, new PesananDetails($item));
        }
        $pesanan->items()->saveMany($items);
        return $pesanan;
    }
}
