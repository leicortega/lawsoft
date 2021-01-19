<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'user_id_one', 'user_id_two'
    ];

    public function user_one() {
        return $this->belongsTo('App\User', 'user_id_one', 'id');
    }

    public function user_two() {
        return $this->belongsTo('App\User', 'user_id_two', 'id');
    }

    public function mensajes() {
        return $this->hasMany('App\Models\Mensaje', 'chats_id', 'id');
    }
}
