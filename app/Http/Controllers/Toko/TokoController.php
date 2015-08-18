<?php

namespace App\Http\Controllers\Toko;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Toko;
use App\User;
use App\Propinsi;
use Validator;

use App\Pesanan;

class TokoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role != "penjual")
            abort(404);

        $toko = $user->toko;

        // kota dan propinsi
        $kota = Propinsi::select('kota')->distinct()->
                    orderBy('kota', 'asc')->lists('kota', 'kota');
        $propinsi = Propinsi::select('propinsi')->distinct()->
            orderBy('propinsi', 'asc')->lists('propinsi', 'propinsi');

        if ($toko == null)
            return view('toko.toko', ['toko'=>null, 'kota'=>$kota, 
            'propinsi'=>$propinsi]);
        else
            return view('toko.toko', ['toko'=>$toko,
                'kota'=>$kota, 'propinsi'=>$propinsi,
                ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => 'required|max:255|unique:toko',
            'nama_bank' => 'required|max:255',
            'atas_nama' => 'required|max:255',
            'nomor_rekening' => 'required|max:255',
            'kota' => 'required|exists:propinsi',
            'propinsi' => 'required|exists:propinsi',
        ]);
    }

    protected function validator_update(array $data, User $user)
    {
        return Validator::make($data, [
            'nama' => 'required|max:255|unique:toko,nama,'.$user->toko->id,
            'nama_bank' => 'required|max:255',
            'atas_nama' => 'required|max:255',
            'nomor_rekening' => 'required|max:255',
            'kota' => 'required|exists:propinsi',
            'propinsi' => 'required|exists:propinsi',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(User $user, array $data)
    {
        $toko = $user->toko;
        if ($toko == null) {
            return Toko::create([
                'user_id' => $user->id,
                'nama' => $data['nama'],
                'nama_bank' => $data['nama_bank'],
                'atas_nama' => $data['atas_nama'],
                'nomor_rekening' => $data['nomor_rekening'],
                'kota'=> $data['kota'],
                'propinsi'=> $data['propinsi'],
            ]);
        } else {
            $toko->nama = $data['nama'];
            $toko->nama_bank = $data['nama_bank'];
            $toko->atas_nama = $data['atas_nama'];
            $toko->nomor_rekening = $data['nomor_rekening'];
            $toko->kota = $data['toko'];
            $toko->propinsi = $data['propinsi'];

            $toko->save();
        }
    }

    public function postToko(Request $request)
    {
        $toko = $request->user()->toko;

        if ($toko == null) {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                $this->throwValidationException (
                    $request, $validator
                );
            }

            $this->create($request->user(), $request->all());
        } else {
            $validator = $this->validator_update($request->all(), $request->user());
            if ($validator->fails()) {
                $this->throwValidationException (
                    $request, $validator
                );
            }

            $toko->nama = $request->nama;
            $toko->nama_bank = $request->nama_bank;
            $toko->atas_nama = $request->atas_nama;
            $toko->nomor_rekening = $request->nomor_rekening;
            $toko->propinsi = $request->propinsi;
            $toko->kota = $request->kota;

            $toko->save();
        }

        return redirect()->route('toko')->with('alert-info', 'Toko berhasil diupdate!');
    }

    public function listOrders(Request $request) {
        $user = $request->user();

        if ($user->role != "penjual")
            abort(404);

        $toko = $user->toko;

        $orders = Pesanan::join('pesanan_details', 'pesanan.id', '=', 
            'pesanan_details.pesanan_id')->
            where('pesanan_details.toko_id', $toko->id)->get();

        return view('toko.orders', ['orders'=>$orders]);
    }
}
