<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demandado extends Model
{
    protected $fillable = [
        'tipo', 'nombre', 'identificacion', 'verificacion', 'telefono', 'correo', 'direccion', 'abogado_id'
    ];

    public function abogado() {
        return $this->belongsTo('App\Models\Abogado_demandado');
    }
}
