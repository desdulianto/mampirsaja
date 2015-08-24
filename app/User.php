<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_depan', 'nama_belakang', 'gender', 'email', 'password', 'username', 'role',
                           'konfirmasi', 'kode_konfirmasi'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function toko() {
        return $this->hasOne('App\Toko');
    }

    public function produks() {
        return $this->hasMany('App\Produk');
    }

    public function pesanan() {
        return $this->hasMany('App\Pesanan', 'user_id');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function pembeli_threads() {
        return $this->hasMany('App\Threads', 'pembeli_id');
    }

    public function penjual_threads() {
        return $this->hasMany('App\Threads', 'penjual_id');
    }

    public function posts() {
        return $this->hasMany('App\Posts', 'dari', 'id');
    }

    public function nama_lengkap() {
        return $this->nama_depan . ' ' . $this->nama_belakang;
    }
}
