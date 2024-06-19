<?php

namespace App\Jobs;

use App\Mail\RecordatorioMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class enviarEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $usuario;
    public $noticia;

    /**
     * Create a new job instance.
     */
    public function __construct($usuario,$noticia)
    {
        $this->usuario = $usuario;
        $this->noticia = $noticia;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->usuario->email)->send(new RecordatorioMail($this->usuario, $this->noticia));
        $this->usuario->noticias()->detach($this->noticia->id);
    }
}
