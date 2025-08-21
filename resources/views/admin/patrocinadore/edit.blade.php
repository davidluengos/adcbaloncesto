@extends('layouts.app')

@section('template_title')
    Update Patrocinadore
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Patrocinadore</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('patrocinadores.update', $patrocinadore->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf

                            @include('admin.patrocinadore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
