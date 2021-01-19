<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResponderConsulta extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $id;
    public $path;
    public $nombre_file;
    public $mine;

    public function __construct($content, $id, $path, $nombre_file, $mine)
    {
        $this->content = $content;
        $this->id = $id;
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
            return $this->view('correos.responder_consulta')
                    ->subject('Respuesta: Solicitud de Consulta ObConsultores')
                    ->attach($this->path, [
                        'as' => $this->nombre_file,
                        'mime' => $this->mine,
                    ]);
        } else {
            return $this->view('correos.responder_consulta')
                    ->subject('Respuesta: Solicitud de Consulta ObConsultores');
        }
    }
}
