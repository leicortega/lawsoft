<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_proceso extends Model
{
    protected $fillable = [
        'tipo', 'abogados_id', 'demandados_id', 'procesos_id'
    ];

    public function abogados() {
        return $this->belongsTo('App\Models\Abogado');
    }

    public function demandados() {
        return $this->belongsTo('App\Models\Demandado');
    }

    public function procesos() {
        return $this->belongsTo('App\Models\Proceso');
    }
}
