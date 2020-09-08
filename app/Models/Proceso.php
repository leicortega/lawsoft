<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $fillable = [
        'id', 'num_proceso' ,'tipo' ,'sub_tipo' ,'departamento' ,'ciudad' ,'descripcion' ,'proceso_file' ,'clientes_id', 'users_id'
    ];

    public function clientes() {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function actuaciones() {
        return $this->hasMany('App\Models\Actuacion', 'procesos_id');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }
}
