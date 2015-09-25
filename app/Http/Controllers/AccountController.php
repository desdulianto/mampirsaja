<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\admin_config;
use Validator;
use File;

use App\UserInfo;
use App\Propinsi;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request) {
        $user = $request->user();
        if ($user->role == "admin")
            return $this->AdminAccount($user);
        else {
            $propinsi = Propinsi::all()->lists('propinsi', 'propinsi');
            return view('account.index', ['account'=>$user, 'propinsi'=>$propinsi]);
        }
    }

    public function save(Request $request) {
        $user = $request->user();

        if ($user->role == "admin")
            return $this->AdminAccountSave($user, $request);
        else
            return view('account.index');
    }

    protected function AdminAccount($user) {
        $config = [];
        foreach (admin_config::get() as $row) {
            $config[$row['property']] = $row['value'];
        }

        $params = array_merge(['user'=>$user], $config);

        if (! array_key_exists('nama', $params))
            $params['nama'] = '';
        if (! array_key_exists('no_rekening', $params))
            $params['no_rekening'] = '';
        if (! array_key_exists('bank', $params))
            $params['bank'] = '';
        if (! array_key_exists('cara_pembayaran', $params))
            $params['cara_pembayaran'] = '';

        return view('account.admin', $params);
    }

    protected function validator_admin(array $data)
    {
        return Validator::make($data, [
            'nama'            => 'required|max:255',
            'no_rekening'     => 'required|max:255',
            'bank'            => 'required|max:255',
            'cara_pembayaran' => 'required|max:255'
            ]);
    }

    protected function AdminAccountSave($user, $request) {
        $validator = $this->validator_admin($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $data = $request->all();

        foreach (['nama', 'no_rekening', 'bank', 'cara_pembayaran'] as $property) {
            $row = admin_config::where('property',$property);
            if ($row->count() == 0)
                admin_config::create(['property'=>$property, 'value'=>$data[$property]]);
            else
                $row->update(['value'=>$data[$property]]);
        }

        return redirect()->route('account')->with('alert-info', "Konfigurasi sudah tersimpan");
    }

    protected function validator_password(array $data) {
        return Validator::make($data, [
            'password'         => 'required|min:6',
            'confirm_password' => 'required|same:password'
            ]);
    }

    public function ubahPassword(Request $request) {
        $user = $request->user();

        $old_password = $request->old_password;
        $password = $request->password;
        $confirm_password = $request->confirm_password;

        $credentials = ['username' => $user->username, 'password'=>$old_password];
        if (Auth::validate($credentials)) {
            $validator = $this->validator_password($request->all());
            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }

            $user->password = Hash::make($password);
            $user->save();

            return redirect()->route('account')->with('alert-info', 'Password sudah diganti');
        } else {
            return redirect()->route('account')->with('alert-danger', 'Password salah');
        }
    }

    protected function validator_info(array $data) {
        return Validator::make($data, [
            'nama_depan'    => 'required:max:255',
            'nama_belakang' => 'required:max:255',
            'gender'        => 'required|in:male,female',
            'email'         => 'required|email',
            'alamat'        => 'max:255',
            'kota'          => 'max:255',
            'propinsi'      => 'max:255',
            'kode_pos'      => 'max:30',
            'telepon'       => 'max:30'
            ]);
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

    public function ubahInfo(Request $request) {
        $user = $request->user();

        $validator = $this->validator_info($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }



        if ($user->info()->first() == null) {
        $info = new UserInfo(['alamat'  =>$request->alamat,
                              'kota'    =>$request->kota,
                              'propinsi'=>$request->propinsi,
                              'kode_pos'=>$request->kode_pos,
                              'telepon' =>$request->telepon]);
        } else {
            $user->nama_depan    = $request->nama_depan;
            $user->nama_belakang = $request->nama_belakang;
            $user->gender        = $request->gender;
            $user->email         = $request->email;
            $info                = $user->info()->first();
            $info->alamat        = $request->alamat;
            $info->kota          = $request->kota;
            $info->propinsi      = $request->propinsi;
            $info->kode_pos      = $request->kode_pos;
            $info->telepon       = $request->telepon;
        }

        if ($request->hapus_foto && $info->foto != null) {
            File::delete('uploads/' . $info->foto);
            $info->foto = null;
        } else if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $dstPath = 'uploads';
                $name = $request->file('foto')->getClientOriginalName();
                $ext = $request->file('foto')->getClientOriginalExtension();
                $file = $this->uniqueFilename($name, $ext);
                $request->file('foto')->move($dstPath, $file);
                $info->foto = $file;
            }
        }

        $user->info()->save($info);
        $user->save();

        return redirect()->route('account')->with('alert-info', 'Informasi user berhasil di-update');
    }
}
