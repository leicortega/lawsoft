<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['id', 'identificacion', 'nombre', 'direccion', 'telefono', 'correo', 'cedula', 'eps', 'arl', 'afp'];

    public function procesos() {
        return $this->hasMany('App\Models\Proceso', 'clientes_id');
    }
}
