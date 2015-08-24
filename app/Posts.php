<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['threads_id', 'tanggal', 'dari', 'ref_post', 'subjek', 'pesan', 'lampiran'];

    public function thread() {
        return $this->belongsTo('App\Threads');
    }

    public function user() {
        return $this->belongsTo('App\User', 'dari');
    }
}
