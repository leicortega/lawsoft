<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProcesoCreado extends Mailable
{
    use Queueable, SerializesModels;

    public $proceso_id;
    public $codigo;
    public $nombre;

    public function __construct($proceso_id, $codigo, $nombre)
    {
        $this->proceso_id = $proceso_id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.proceso_creado');
    }
}
