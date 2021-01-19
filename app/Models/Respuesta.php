<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = [
        'fecha', 'mensaje', 'user_id', 'leido', 'consultas_id'
    ];

    public function consulta() {
        return $this->belongsTo('App\Models\Consulta');
    }
}
