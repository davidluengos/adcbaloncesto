<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $cart;
    public $total;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cliente, $cart)
    {
        $this->cliente = $cliente;
        $this->cart = $cart;
        $this->total = collect($cart)->sum(fn($item) => $item['precio'] * $item['cantidad']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Nuevo pedido - {$this->cliente['nombre']}")
                    ->markdown('emails.pedido');
    }
}
