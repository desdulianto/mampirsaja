<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastLogin extends Model
{
    protected $table = 'last_logins';
    protected $fillable = ['user_id'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
