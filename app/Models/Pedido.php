<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'comentarios',
        'socio',
        'total',
    ];

    public function productos()
    {
        return $this->hasMany(PedidoProducto::class);
    }
}
