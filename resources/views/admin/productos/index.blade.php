@extends('layouts.app')

@section('template_title')
    Productos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Productos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
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
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Disponible</th>
                                        <th>Agotado</th>
                                        <th>Tiene tallas</th>
                                        <th>Imagen</th>
                                        <th>Imagen 2</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->id }}</td>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ number_format($producto->precio, 2) }} €</td>
                                            <td>{{ $producto->disponible ? '✅' : '❌' }}</td>
                                            <td>{{ $producto->agotado ? '✅' : '❌' }}</td>
                                            <td>{{ $producto->tiene_tallas ? '✅' : '❌' }}</td>
                                            <td>
                                                @if ($producto->imagen)
                                                    <img src="{{ asset($producto->imagen) }}" width="50">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($producto->imagen2)
                                                    <img src="{{ asset($producto->imagen2) }}" width="50">
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                {{-- <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i></a> --}}
                                                <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
