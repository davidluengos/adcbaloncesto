<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $jugadore->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero') }}
            {{ Form::text('numero', $jugadore->numero, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Numero']) }}
            {!! $errors->first('numero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('equipo_id') }}
            {{ Form::select('equipo_id', $equipos, $jugadore->equipo_id, ['class' => 'form-control' . ($errors->has('equipo_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione...']) }}
            {!! $errors->first('equipo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rol_id') }}
            {{ Form::select('rol_id', $roles, $jugadore->rol_id, ['class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione...']) }}
            {!! $errors->first('rol_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('posicion_id') }}
            {{ Form::select('posicion_id', $posiciones, $jugadore->posicion_id, ['class' => 'form-control' . ($errors->has('posicion_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione...']) }}
            {!! $errors->first('posicion_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('activo', 'Activo') }}
            <div class="form-check {{ $errors->has('activo') ? 'is-invalid' : '' }}">
                {{ Form::radio('activo', '1', $jugadore->activo == '1', ['id' => 'activo1', 'class' => 'form-check-input']) }}
                {{ Form::label('activo1', 'Sí', ['class' => 'form-check-label']) }}
            </div>
            <div class="form-check {{ $errors->has('activo') ? 'is-invalid' : '' }}">
                {{ Form::radio('activo', '0', $jugadore->activo == '0', ['id' => 'activo0', 'class' => 'form-check-input']) }}
                {{ Form::label('activo0', 'No', ['class' => 'form-check-label']) }}
            </div>
            {!! $errors->first('activo', '<div class="invalid-feedback d-block">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen', ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>