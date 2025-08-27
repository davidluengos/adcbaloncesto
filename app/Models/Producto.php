<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'precio',
        'disponible', 'agotado', 'tiene_tallas', 
        'imagen', 'imagen2'
    ];

    protected $casts = [
        'disponible' => 'boolean',
        'agotado' => 'boolean',
        'tiene_tallas' => 'boolean',
    ];

    public function sePuedeComprar()
    {
        return $this->disponible && !$this->agotado;
    }

    public function pedidos()
    {
        return $this->hasMany(PedidoProducto::class);
    }
}