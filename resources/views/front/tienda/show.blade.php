@extends('front.main')

@section('content')
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-md-6">
                        @if ($producto->imagen)
                            <img src="{{ asset($producto->imagen) }}" class="img-fluid rounded mb-3"
                                alt="{{ $producto->nombre }}">
                        @endif
                        @if ($producto->imagen2)
                            <img src="{{ asset($producto->imagen2) }}" class="img-fluid rounded"
                                alt="{{ $producto->nombre }}">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $producto->nombre }}</h1>
                        {{-- <p class="text-muted">{{ $producto->descripcion }}</p> --}}
                        @php
                            $esOferta = false;
                            $precioOriginal = null;

                            if ($producto->descripcion && str_contains($producto->descripcion, '[OFERTA]')) {
                                $esOferta = true;
                                // Extraer el precio original después de [OFERTA]
                                $precioOriginal = trim(str_replace('[OFERTA]', '', $producto->descripcion));
                            }
                        @endphp

                        {{-- Precio o alerta de oferta --}}
                        @if ($esOferta)
                            <div class="alert alert-danger p-2 text-center mb-2 fw-bold fs-4">
                                ¡OFERTA! {{ number_format($producto->precio, 2) }} €
                                @if ($precioOriginal)
                                    <span
                                        class="text-decoration-line-through text-secondary ms-2">{{ $precioOriginal }}</span>
                                @endif
                            </div>
                        @else
                            <h3 class="text-primary">{{ number_format($producto->precio, 2) }} €</h3>
                        @endif


                        <form action="{{ route('tienda.addToCart', $producto->id) }}" method="POST" class="mt-3">
                            @csrf
                            @if ($producto->tiene_tallas)
                                <div class="mb-3">
                                    <label for="talla" class="form-label">Talla:</label>
                                    <select name="talla" class="form-select" required>
                                        <option value="">-- Selecciona talla --</option>
                                        <option>XS</option>
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                        <option>XXL</option>
                                        <option>Otra (añadir en comentarios)</option>
                                    </select>
                                </div>
                            @endif
                            {{-- input de cantidad --}}
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad:</label>
                                <input type="number" name="cantidad" class="form-control" value="1" min="1"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-success">🛒 Añadir al carrito</button>
                        </form>

                        <a href="{{ route('tienda.index') }}" class="btn btn-primary mt-3">⬅️ Volver a la tienda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
