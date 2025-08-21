@extends('layouts.app')

@section('template_title')
    {{ $documento->name ?? 'Show Documento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Documento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('documentos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $documento->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $documento->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong>
                            {{ $documento->documento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
