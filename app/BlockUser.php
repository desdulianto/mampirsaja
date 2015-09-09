<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockUser extends Model
{
    protected $table = 'block_users';

    protected $fillable = ['user_id', 'alasan'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
