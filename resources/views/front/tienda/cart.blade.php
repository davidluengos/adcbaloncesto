@extends('front.main')

@section('content')




<!-- 404 Start -->


<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row justify-content-center">
        <div class="col-lg-10">
<div class="row">
        <div class="container my-4">
    <h1>🛒 Tu carrito</h1>

    @if(count($cart) === 0)
        <div class="alert alert-info">No hay productos en el carrito.</div>
        <a href="{{ route('tienda.index') }}" class="btn btn-primary">⬅️ Seguir comprando</a>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Talla</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>{{ $item['nombre'] }}</td>
                            <td>{{ $item['cantidad'] }}</td>
                            <td>{{ $item['talla'] ?? '-' }}</td>
                            <td>{{ number_format($item['precio'], 2) }} €</td>
                            <td>{{ number_format($item['precio'] * $item['cantidad'], 2) }} €</td>
                            <td>
                                <form action="{{ route('tienda.removeFromCart', $id) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto del carrito?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">❌ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @php $total += $item['precio'] * $item['cantidad']; @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-primary">
                        <td colspan="4" class="text-end"><strong>Total</strong></td>
                        <td><strong>{{ number_format($total, 2) }} €</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <a href="{{ route('tienda.checkout') }}" class="btn btn-success mt-3">✅ Finalizar pedido</a>
        <form action="{{ route('tienda.clearCart') }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que quieres vaciar todo el carrito?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-secondary mt-3">🗑️ Vaciar carrito</button>
    <a href="{{ route('tienda.index') }}" class="btn btn-primary mt-3">⬅️ Seguir comprando</a>
</form>
    @endif
</div>
    </div>
       
        </div>
    </div>
</div>
</div>
<!-- 404 End -->

@endsection