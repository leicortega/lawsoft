<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['id', 'tipo_cliente', 'identificacion', 'verificacion', 'nombre', 'direccion', 'telefono', 'celular', 'correo', 'correo_dos', 'cedula', 'contrato', 'poder', 'titulo_valor', 'eps', 'arl', 'afp'];

    public function procesos() {
        return $this->hasMany('App\Models\Proceso', 'clientes_id');
    }
}
