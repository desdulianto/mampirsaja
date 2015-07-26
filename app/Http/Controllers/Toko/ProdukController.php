<?php

namespace App\Http\Controllers\Toko;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Toko;
use App\User;
use App\Kategori;
use App\Produk;
use Validator;
use DB;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function checkUserToko($user)
    {
        if ($user->role != 'penjual')
            abort(404);

        $toko = $user->toko;

        if ($toko == null)
            return redirect('toko.toko', ['toko'=>$toko]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama'        => 'required|max:255',
            'tipe'        => 'required|in:fisik,digital',
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi'   => 'required|max:1024',
            'stock'       => 'required|numeric|min:0',
            'harga'       => 'required|numeric|min:0',
        ]);
    }

    protected function create(Toko $toko, array $data)
    {
        return $toko->produks()->create([
            'nama'        => $data['nama'],
            'tipe'        => $data['tipe'],
            'kategori_id' => $data['kategori_id'],
            'deskripsi'   => $data['deskripsi'],
            'stock'       => $data['stock'],
            'harga'       => $data['harga'],
        ]);
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $this->checkUserToko($user);

        $toko = $user->toko;

        $produks = Produk::where('toko_id', $toko->id)->get();

        return view('toko.produk', ['produks'=>$produks]);
    }

    public function baru(Request $request)
    {
        $user = $request->user();

        $this->checkUserToko($user);

        $kategoris = DB::table('kategoris')->where('name', '<>', 'semua')->lists('label', 'id');

        return view('toko.produk-form', ['produk'=>null, 'judul'=>'Tambah Item Produk',
            'kategoris'=>$kategoris]);
    }

    public function baruPost(Request $request)
    {
        $user = $request->user();
        $this->checkUserToko($user);
        $toko = $user->toko;

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException (
                $request, $validator
            );
        }

        $this->create($toko, $request->all());

        return redirect()->route('produk')->with('alert-info', "Produk $request->nama sudah tersimpan");
    }
}
