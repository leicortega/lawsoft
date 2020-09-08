<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actuacion extends Model
{
    protected $table = 'actuaciones';

    protected $fillable = [
        'id', 'fecha', 'actuacion', 'anotacion', 'f_inicio_termino', 'f_fin_termino', 'anotacion_file', 'procesos_id'
    ];

    public function procesos() {
        return $this->belongsTo('App\Models\Proceso');
    }
}
