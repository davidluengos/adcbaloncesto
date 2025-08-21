@extends('front.main')
  
@php
    $title = 'Página no encontrada'
@endphp

@section('content')
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h2>¡Ooops!</h2> <h2>La ruta que buscas no existe.</h2>
            <p>¡Inténtalo de nuevo!</p>
            <a href="/" class="btn btn-primary py-sm-3 px-sm-4">Ir a página de Inicio</a>
        </div>
    </div>
@endsection