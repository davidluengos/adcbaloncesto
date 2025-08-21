@extends('layouts.app')

@section('template_title')
    {{ $jugadore->name ?? 'Show Jugadore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Jugadore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('jugadores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $jugadore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Numero:</strong>
                            {{ $jugadore->numero }}
                        </div>
                        <div class="form-group">
                            <strong>Equipo Id:</strong>
                            {{ $jugadore->equipo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Rol Id:</strong>
                            {{ $jugadore->rol_id }}
                        </div>
                        <div class="form-group">
                            <strong>Posicion Id:</strong>
                            {{ $jugadore->posicion_id }}
                        </div>
                        <div class="form-group">
                            <strong>Activo:</strong>
                            {{ $jugadore->activo ? 'Sí' : 'No' }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $jugadore->imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
