<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['thread', 'dari_id', 'kepada_id', 'waktu', 'subjek', 'pesan', 
        'baca'];

    public function pengirim() {
        return $this->belongsTo('App\User', 'dari_id');
    }

    public function penerima() {
        return $this->belongsTo('App\User', 'kepada_id');
    }

    public function index() {
        return $this->belongsTo('App\MessageIndex', 'thread', 'id');
    }
}
