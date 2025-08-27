<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Listado de pedidos
    public function index()
    {
        $title = "Pedidos";
        $pedidos = Pedido::with('productos')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pedidos.index', compact('title', 'pedidos'));
    }
}
