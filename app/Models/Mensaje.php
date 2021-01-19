<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $fillable = [
        'fecha', 'mensaje', 'visto', 'chats_id'
    ];

    public function chats() {
        return $this->belongsTo('App\Models\Chat');
    }
}
