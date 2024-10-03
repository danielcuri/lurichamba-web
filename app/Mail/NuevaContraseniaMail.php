<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevaContraseniaMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $contrasenia;

    public function __construct($contrasenia)
    {
        $this->contrasenia  = $contrasenia;
    }

    public function build()
    {
        $contrasenia = $this->contrasenia;

        return $this->subject('RUWANI - NUEVA CONTRASEÑA')
            ->view('emails.nueva-contrasenia', compact('contrasenia')); // Vista del correo (opcional)
    }
}
