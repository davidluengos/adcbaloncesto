<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\PedidoMail;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class TiendaController extends Controller
{
    // Listado de productos
    public function index()
    {
        $title = "Tienda";
        $productos = Producto::where('disponible', true)
            ->get();

        return view('front.tienda.index', compact('productos', 'title'));
    }

    // Detalle de producto
    public function show($id)
    {
        $title = "Detalle del producto";
        $producto = Producto::findOrFail($id);
        return view('front.tienda.show', compact('producto', 'title'));
    }

    // Añadir al carrito
    public function addToCart(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $cart = Session::get('cart', []);

        $talla = $request->input('talla', null);
        $cantidad = $request->input('cantidad', 1);

        $cart[] = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'talla' => $talla,
            'cantidad' => $cantidad,
        ];

        Session::put('cart', $cart);

        return redirect()->route('tienda.cart')->with('success', 'Producto añadido al carrito');
    }

    // Ver carrito
    public function cart()
    {
        $title = "Tu carrito";
        $cart = Session::get('cart', []);
        return view('front.tienda.cart', compact('cart', 'title'));
    }

    // Finalizar pedido (checkout)
    public function checkout()
    {
        $title = "Finalizar pedido";
        $cart = Session::get('cart', []);
        return view('front.tienda.checkout', compact('cart', 'title'));
    }

    // Procesar pedido (envía email)
    public function processOrder(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string|max:20',
            'comentarios' => 'nullable|string|max:500',
        ]);

        $cart = Session::get('cart', []);

        // Enviar correo al administrador
        Mail::to('pedidos@adcbaloncesto.es')->send(new PedidoMail($data, $cart));

        // Enviar copia al cliente
        Mail::to($data['email'])->send(new PedidoMail($data, $cart));

        // Vaciar carrito
        Session::forget('cart');

        return redirect()->route('tienda.index')->with('success', 'Tu pedido ha sido solicitado correctamente. Nos pondremos en contacto contigo próximamente.');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('tienda.cart')->with('success', 'Producto eliminado del carrito.');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('tienda.cart')->with('success', 'Carrito vaciado correctamente.');
    }
}
