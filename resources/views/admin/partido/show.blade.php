@extends('layouts.app')

@section('template_title')
    {{ $partido->name ?? 'Show Partido' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Partido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('partidos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $partido->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Equipo Local Id:</strong>
                            {{ $partido->equipo_local_id }}
                        </div>
                        <div class="form-group">
                            <strong>Equipo Visitante Id:</strong>
                            {{ $partido->equipo_visitante_id }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $partido->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pabellon:</strong>
                            {{ $partido->pabellon }}
                        </div>
                        <div class="form-group">
                            <strong>Localidad:</strong>
                            {{ $partido->localidad }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $partido->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Resultado Local:</strong>
                            {{ $partido->resultado_local }}
                        </div>
                        <div class="form-group">
                            <strong>Resultado Visitante:</strong>
                            {{ $partido->resultado_visitante }}
                        </div>
                        <div class="form-group">
                            <strong>Alqazeres Es Local:</strong>
                            {{ $partido->alqazeres_es_local }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
