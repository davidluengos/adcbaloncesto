@extends('front.main')

@section('content')
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    @foreach ($productos as $producto)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                {{-- Imagen --}}
                                @if ($producto->imagen)
                                    <img src="{{ asset($producto->imagen) }}" class="card-img-top"
                                        alt="{{ $producto->nombre }}">
                                @else
                                    <img src="https://via.placeholder.com/300x200?text=Sin+Imagen" class="card-img-top"
                                        alt="sin imagen">
                                @endif

                                {{-- Cuerpo --}}
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $producto->nombre }}</h5>

                                    {{-- Precio o alerta de oferta --}}
                                    @if ($producto->precio_original)
                                        <div class="alert alert-danger p-2 text-center mb-2 fw-bold fs-5">
                                            ¡OFERTA! {{ number_format($producto->precio, 2) }} €
                                            <span class="text-decoration-line-through text-secondary ms-2">
                                                {{ number_format($producto->precio_original, 2) }} €
                                            </span>
                                        </div>
                                    @else
                                        <h6 class="text-primary mb-3 fs-5">{{ number_format($producto->precio, 2) }} €</h6>
                                    @endif

                                    {{-- Botón --}}
                                    <a href="{{ route('tienda.show', $producto->id) }}"
                                        class="btn btn-outline-primary mt-auto">
                                        Ver producto
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
