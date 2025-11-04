@extends('layouts.app')

@section('template_title')
    Log de Resultados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span id="card_title">
                            📋 {{ __('Log de Resultados') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('resultados-logs') }}" class="btn btn-sm btn-primary" title="Actualizar Log">
                                <i class="fa fa-refresh"></i> Actualizar
                            </a>
                        </div>
                    </div>

                    <div class="card-header">
                        <strong>Archivo de log:</strong> <code>storage/logs/resultados.log</code> que contiene los registros del comando programado para actualizar los resultados de los partidos.
                    </div>

                    <div class="card-body" style="background-color:#111; color:#0f0;">
                        <div class="log-viewer" 
                             style="font-family: monospace;  max-height:70vh; overflow-y:auto; background:#111;  border-radius:5px;">
                            @forelse($logs as $line)
                                <div>{{ $line }}</div>
                            @empty
                                <div class="text-muted">No hay registros en el archivo de log.</div>
                            @endforelse
                        </div>
                    </div>

                    <div class="card-footer text-muted text-right">
                        Mostrando las 200 líneas más recientes de <code>storage/logs/resultados.log</code>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
