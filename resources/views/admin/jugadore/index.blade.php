@extends('layouts.app')

@section('template_title')
    Jugadore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Jugadore') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('jugadores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Numero</th>
										<th>Equipo Id</th>
										<th>Rol Id</th>
										<th>Posicion Id</th>
                                        <th>Activo</th>
										<th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jugadores as $jugadore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $jugadore->nombre }}</td>
											<td>{{ $jugadore->numero }}</td>
											<td>{{ $jugadore->equipo->nombre }}</td>
											<td>{{ $jugadore->role->nombre }}</td>
											<td>{{ $jugadore->posicione->nombre }}</td>
                                            <td>{{ $jugadore->activo ? 'Sí' : 'No' }}</td>
											<td>{{ $jugadore->imagen }}</td>

                                            <td>
                                                <form action="{{ route('jugadores.destroy',$jugadore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('jugadores.show',$jugadore->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('jugadores.edit',$jugadore->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $jugadores->links() !!}
            </div>
        </div>
    </div>
@endsection
