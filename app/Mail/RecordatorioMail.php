<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecordatorioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $noticia;

    /**
     * Create a new message instance.
     */
    public function __construct($usuario, $noticia)
    {
        $this->usuario = $usuario;
        $this->noticia = $noticia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Recordatorio Mail')
                    ->view('emails.recordatorio')
                    ->with([
                        'noticia' => $this->noticia,
                        'user' => $this->usuario,
                    ]);
    }
}
