@extends('layouts.app')

@section('template_title')
    Update Posicione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Posicione</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('posiciones.update', $posicione->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf

                            @include('admin.posicione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
