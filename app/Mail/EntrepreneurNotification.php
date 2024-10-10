<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EntrepreneurNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $fullname;
    public $email;
    public $cellphone;
    /**
     * Create a new message instance.
     */
    public function __construct($fullname, $email, $cellphone)
    {
        $this->fullname  = $fullname;
        $this->email  = $email;
        $this->cellphone  = $cellphone;
    }

    /**
     * Get the message envelope.
     */
    /*public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitud de Registro Emprendedor',
        );
    }*/

    /**
     * Get the message content definition.
     */
    /*public function content(): Content
    {
        return new Content(
            view: 'emails.entrepreneur-notification',
            data: [
                'fullname' => $this->fullname,
                'email' => $this->email,
                'cellphone' => $this->cellphone,
            ] // Pasar datos a la vista
        );
    }*/
    public function build()
    {

        $fullname = $this->fullname;
        $email= $this->email;
        $cellphone= $this->cellphone;
        return $this->subject('Solicitud de Registro Emprendedor')
            ->view('emails.entrepreneur-notification', compact('fullname','email','cellphone')); // Vista del correo (opcional)
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
}
