@extends('front.main')

@section('content')


    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="container my-4">
                        <h1>✅ Finalizar pedido</h1>

                        <div class="card shadow-sm p-4 mt-4">
                            <h4>Resumen del carrito</h4>
                            <ul class="list-group mb-3">
                                @php $total = 0; @endphp
                                @foreach ($cart as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $item['nombre'] }} ({{ $item['talla'] ?? '-' }})
                                        <span>{{ $item['precio'] }} € x {{ $item['cantidad'] }}</span>
                                    </li>
                                    @php $total += $item['precio'] * $item['cantidad']; @endphp
                                @endforeach
                                <li class="list-group-item list-group-item-primary d-flex justify-content-between">
                                    <strong>Total</strong>
                                    <strong>{{ number_format($total, 2) }} €</strong>
                                </li>
                            </ul>

                            <form action="{{ route('tienda.processOrder') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nombre completo</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Comentarios</label>
                                    <textarea name="comentarios" class="form-control" rows="3" ></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">📧 Solicitar pedido</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 404 End -->
        @endsection
