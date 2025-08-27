@extends('layouts.app')

@section('template_title')
    Pedidos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pedidos') }}
                            </span>

                            <div class="float-right">

                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Productos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <td>{{ $pedido->id }}</td>
                                            <td>{{ $pedido->nombre }}</td>
                                            <td>{{ $pedido->email }}</td>
                                            <td>{{ $pedido->telefono }}</td>
                                            <td><strong>{{ number_format($pedido->total, 2) }} €</strong></td>
                                            <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <ul class="mb-0">
                                                    @foreach ($pedido->productos as $producto)
                                                        <li>
                                                            {{ $producto->cantidad }} × {{ $producto->nombre }}
                                                            @if ($producto->talla)
                                                                (Talla: {{ $producto->talla }})
                                                            @endif
                                                            — {{ number_format($producto->precio, 2) }} €
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pedidos->links() !!}
            </div>
        </div>
    </div>
@endsection
