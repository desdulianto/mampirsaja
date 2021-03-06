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
use File;

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
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi'   => 'required|max:1024',
            'stock'       => 'required|numeric|min:0',
            'harga'       => 'required|numeric|min:0',
            'berat'       => 'required|between:0.01,99.99',
        ]);
    }

    protected function create(Toko $toko, array $data)
    {
        if (array_key_exists('foto', $data)) {
        return $toko->produks()->create([
            'nama'        => $data['nama'],
            'kategori_id' => $data['kategori_id'],
            'deskripsi'   => $data['deskripsi'],
            'stock'       => $data['stock'],
            'harga'       => $data['harga'],
            'foto'        => $data['foto'],
            'berat'       => $data['berat'],
        ]);
        } else {
        return $toko->produks()->create([
            'nama'        => $data['nama'],
            'kategori_id' => $data['kategori_id'],
            'deskripsi'   => $data['deskripsi'],
            'stock'       => $data['stock'],
            'harga'       => $data['harga'],
            'berat'       => $data['berat'],
        ]);
        }
    }

    protected function uniqueFilename($name, $ext) {
        $output = $name;
        $basename = basename($name, '.' . $ext);
        $i = 2;
        while(File::exists('uploads' . '/' . $output)) {
            $output = $basename . $i . '.' . $ext;
            $i ++;
        }
        return $output;
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

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $dstPath = 'uploads';
                $name = $request->file('foto')->getClientOriginalName();
                $ext = $request->file('foto')->getClientOriginalExtension();
                $file = $this->uniqueFilename($name, $ext);
                $request->file('foto')->move($dstPath, $file);
                $data['foto'] = $file;
            }
        }

        $this->create($toko, $data);

        return redirect()->route('produk')->with('alert-info', "Produk $request->nama sudah tersimpan");
    }

    public function hapus(Request $request) {
        $produk = Produk::where('id', $request->id)->first();

        if ($produk == null)
            abort(404);

        if (count($produk->pesanan_item) > 0) {
            return redirect()->route('produk')->with('alert-warning', "Produk $produk->nama memiliki daftar pesanan");
        }

        $nama = $produk->nama;
        $produk->delete();

        return redirect()->route('produk')->with('alert-info', "Produk $nama sudah dihapus");
    }
}
