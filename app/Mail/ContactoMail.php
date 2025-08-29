<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('pedidos@adcbaloncesto.es', config('app.name'))
                    ->replyTo($this->data['email'], $this->data['name'])
                    ->subject('Nuevo mensaje de contacto de ' . $this->data['name'])
                    ->markdown('emails.contacto');
    }
}
