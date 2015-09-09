<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\admin_config;
use Validator;

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
        else
            return view('account.index', ['account'=>$user]);
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
}
