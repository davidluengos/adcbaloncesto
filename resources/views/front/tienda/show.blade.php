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
                        <p class="text-muted">{{ $producto->descripcion }}</p>
                        <h3 class="text-primary">{{ number_format($producto->precio, 2) }} €</h3>

                        <form action="{{ route('tienda.addToCart', $producto->id) }}" method="POST" class="mt-3">
                            @csrf
                            @if ($producto->tiene_tallas)
                                <div class="mb-3">
                                    <label for="talla" class="form-label">Talla:</label>
                                    <select name="talla" class="form-select" required>
                                        <option value="">-- Selecciona talla --</option>
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                </div>
                            @endif
                            {{-- input de comentarios --}}
                            <div class="mb-3">
                                <label for="comentarios" class="form-label">Comentarios:</label>
                                <textarea name="comentarios" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">🛒 Añadir al carrito</button>
                        </form>

                        <a href="{{ route('tienda.index') }}" class="btn btn-link mt-3">⬅️ Volver a la tienda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection