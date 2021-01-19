<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensajes_cliente extends Model
{
    protected $table = 'mensajes_cliente';

    protected $fillable = [
        'fecha', 'asunto', 'mensaje', 'user_id', 'clientes_id'
    ];

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente');
    }
}
