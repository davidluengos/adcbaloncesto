@extends('layouts.app')

@section('template_title')
    Create Patrocinador Tipo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Patrocinador Tipo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('patrocinador-tipos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.patrocinador-tipo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
