<?php

namespace App\Http\Controllers\Admin;

use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\BlockUser;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::get();
        return view('admin.users', ['users'=>$users]);
    }

    public function detail(Request $request) {
        $user = User::where('username', $request->username)->first();

        if ($user == null)
            abort(404);

        return view('admin.user', ['user'=>$user]);
    }

    public function block(Request $request) {
        $user = User::where('username', $request->username)->first();

        if ($user == null)
            abort(404);

        $user->konfirmasi = false;
        $alasan = new BlockUser(['alasan'=>'Diblock oleh admin',
                                 'user_id'=>$user->id]);
        $user->alasan()->save($alasan);
        $user->save();

        $nama_lengkap = $user->nama_lengkap();
        $alasan_block = $user->alasan_block();
        Mail::send('notification', array('judul'=>'Block akun mampirsaja.com', 'isi'=>"Dear $nama_lengkap,
            kami terpaksa memblokir akun Anda di mampirsaja.com dengan alasan sebagai berikut:
            $alasan_block"
            , 'user'=>$user), function($pesan) use ($user) {
                    $pesan->to($user->email, $user->username)->subject('Block Akun mampirsaja.com');
        });


        return redirect()->route('users')->with('alert-info', "user $user->username sudah di block");
    }

    public function unblock(Request $request) {
        $user = User::where('username', $request->username)->first();

        if ($user == null)
            abort(404);

        $user->konfirmasi = true;
        $user->save();

        $nama_lengkap = $user->nama_lengkap();
        Mail::send('notification', array('judul'=>'Unblock akun mampirsaja.com', 'isi'=>"Dear $nama_lengkap,
            kami telah mengaktifkan kembali akun Anda di mampirsaja.com. Silahkan login kembali, terima kasih."
            , 'user'=>$user), function($pesan) use ($user) {
                    $pesan->to($user->email, $user->username)->subject('Unblock Akun mampirsaja.com');
        });


        return redirect()->route('users')->with('alert-info', "user $user->username sudah di aktifkan kembali");
    }
}
