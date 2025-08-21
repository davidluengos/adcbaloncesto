@extends('layouts.app')

@section('template_title')
    {{ $equipo->name ?? 'Show Equipo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Equipo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('equipos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $equipo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Pertenece Al Club:</strong>
                            {{ $equipo->pertenece_al_club }}
                        </div>
                        <div class="form-group">
                            <strong>Genero Id:</strong>
                            {{ $equipo->genero_id }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $equipo->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $equipo->imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
