<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $partido->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('equipo_local_id') }}
            {{ Form::select('equipo_local_id', $equipos, $partido->equipo_local_id, ['class' => 'form-control' . ($errors->has('equipo_local_id') ? ' is-invalid' : ''), 'placeholder' => 'Equipo Local Id']) }}
            {!! $errors->first('equipo_local_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('equipo_visitante_id') }}
            {{ Form::select('equipo_visitante_id', $equipos, $partido->equipo_visitante_id, ['class' => 'form-control' . ($errors->has('equipo_visitante_id') ? ' is-invalid' : ''), 'placeholder' => 'Equipo Visitante Id']) }}
            {!! $errors->first('equipo_visitante_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            {{ Form::select('categoria_id', $categorias, $partido->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pabellon') }}
            {{ Form::text('pabellon', $partido->pabellon, ['class' => 'form-control' . ($errors->has('pabellon') ? ' is-invalid' : ''), 'placeholder' => 'Pabellon']) }}
            {!! $errors->first('pabellon', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('localidad') }}
            {{ Form::text('localidad', $partido->localidad, ['class' => 'form-control' . ($errors->has('localidad') ? ' is-invalid' : ''), 'placeholder' => 'Localidad']) }}
            {!! $errors->first('localidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario') }}
            {{ Form::text('comentario', $partido->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
            {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resultado_local') }}
            {{ Form::text('resultado_local', $partido->resultado_local, ['class' => 'form-control' . ($errors->has('resultado_local') ? ' is-invalid' : ''), 'placeholder' => 'Resultado Local']) }}
            {!! $errors->first('resultado_local', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resultado_visitante') }}
            {{ Form::text('resultado_visitante', $partido->resultado_visitante, ['class' => 'form-control' . ($errors->has('resultado_visitante') ? ' is-invalid' : ''), 'placeholder' => 'Resultado Visitante']) }}
            {!! $errors->first('resultado_visitante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('alqazeres_es_local') }}
            {{ Form::text('alqazeres_es_local', $partido->alqazeres_es_local, ['class' => 'form-control' . ($errors->has('alqazeres_es_local') ? ' is-invalid' : ''), 'placeholder' => 'Alqazeres Es Local']) }}
            {!! $errors->first('alqazeres_es_local', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>