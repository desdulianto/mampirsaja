<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageIndex extends Model
{
    protected $table = 'message_indices';

    protected $fillable = ['user1_id', 'user2_id'];

    public function messages() {
        return $this->hasMany('App\Message', 'thread', 'id');
    }

    public function user1() {
        return $this->belongsTo('App\User', 'user1_id');
    }

    public function user2() {
        return $this->belongsTo('App\User', 'user2_id');
    }
}
