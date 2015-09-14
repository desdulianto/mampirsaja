<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Mail;

use App\User;
use App\BlockUser;

class CronJob extends Controller
{
    public function jobs(Request $request) {
        /*if ($request->ip() != "127.0.0.1") {
            abort(403);
    } else {*/
            $this->checkPenjualTidakLogin1Bulan();
            $this->checkPenjualTidakLogin2Bulan();
            /*}*/
        return;
    }

    protected function checkPenjualTidakLogin1Bulan() {
        $users = User::where('username', '<>', 'admin')->
            where('role', 'penjual')->where('konfirmasi', true)->get();

        $logins = [];

        foreach($users as $user) {
            if (Carbon::now('Asia/Jakarta')->diffInDays($user->latest_login()) == 30) {
                
            Mail::send('notif1bulan', array('user'=>$user), function($pesan) use ($user) {
                        $pesan->to($user->email, $user->username)->subject('Hallo ' . $user->nama_lengkap());
            });

            }
        }

        return;
    }

    protected function checkPenjualTidakLogin2Bulan() {
        $users = User::where('username', '<>', 'admin')->
            where('role', 'penjual')->where('konfirmasi', true)->get();

        $logins = [];

        foreach($users as $user) {
            if (Carbon::now('Asia/Jakarta')->diffInDays($user->latest_login()) == 60) {
                
            Mail::send('notif2bulan', array('user'=>$user), function($pesan) use ($user) {
                        $pesan->to($user->email, $user->username)->subject('Hallo ' . $user->nama_lengkap());
            });

            }

            $alasan = new BlockUser(['alasan'=>'User tidak aktif >= 2 bulan',
                                     'user_id'=>$user->id]);
            $user->alasan()->save($alasan);
            $user->konfirmasi = false;
            $user->save();
        }

        return;
    }

}
