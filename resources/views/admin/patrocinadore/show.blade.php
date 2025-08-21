@extends('layouts.app')

@section('template_title')
    {{ $patrocinadore->name ?? 'Show Patrocinadore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Patrocinadore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('patrocinadores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $patrocinadore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Patrocinador Id:</strong>
                            {{ $patrocinadore->tipo_patrocinador_id }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $patrocinadore->imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
