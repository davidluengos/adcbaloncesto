@extends('layouts.app')

@section('template_title')
    {{ $temporada->temporada ?? 'Show Temporada' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Temporada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('temporada.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Temporada:</strong>
                            {{ $temporada->temporada }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de inicio:</strong>
                            {{ $temporada->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de fin:</strong>
                            {{ $temporada->fecha_fin }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
