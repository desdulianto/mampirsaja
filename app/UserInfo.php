<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_infos';
    protected $fillable = ['foto', 'alamat', 'kota', 'propinsi', 'kode_pos', 'telepon'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
