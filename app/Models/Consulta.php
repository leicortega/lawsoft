<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'fecha', 'nombre', 'correo', 'telefono', 'asunto', 'mensaje', 'leido'
    ];

    public function respuestas() {
        return $this->hasMany('App\Models\Respuesta', 'consultas_id');
    }
}
