<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MensajeCliente extends Mailable
{
    use Queueable, SerializesModels;

    public $mensaje;
    public $asunto;
    public $path;
    public $nombre_file;
    public $mine;

    public function __construct($mensaje, $asunto, $path, $nombre_file, $mine)
    {
        $this->mensaje = $mensaje;
        $this->asunto = $asunto;
        $this->path = $path;
        $this->nombre_file = $nombre_file;
        $this->mine = $mine;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->path != '') {
            return $this->view('correos.mensaje_cliente')
                    ->subject($this->asunto)
                    ->attach($this->path, [
                        'as' => $this->nombre_file,
                        'mime' => $this->mine,
                    ]);
        } else {
            return $this->view('correos.mensaje_cliente')
                    ->subject($this->asunto);
        }
    }
}




