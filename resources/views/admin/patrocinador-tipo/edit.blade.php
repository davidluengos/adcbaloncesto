@extends('layouts.app')

@section('template_title')
    Update Patrocinador Tipo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Patrocinador Tipo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('patrocinador-tipos.update', $patrocinadorTipo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf

                            @include('admin.patrocinador-tipo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
