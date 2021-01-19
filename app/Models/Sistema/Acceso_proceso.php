<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Acceso_proceso extends Model
{
    protected $fillable = [
        'users_id', 'procesos_id'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function proceso() {
        return $this->belongsTo('App\Models\Proceso', 'procesos_id');
    }
}
