<div class="box box-info padding-1">
    <div class="box-body">
        {{-- Form Group for Nombre --}}
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- Form Group for Descripcion --}}
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::textarea('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- Form Group for Precio --}}
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::number('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- Form Group for Precio Original --}}
        <div class="form-group">
            {{ Form::label('precio_original') }} (Si se rellena, es oferta)
            {{ Form::number('precio_original', $producto->precio_original, ['class' => 'form-control' . ($errors->has('precio_original') ? ' is-invalid' : ''), 'placeholder' => 'Precio Original']) }}
            {!! $errors->first('precio_original', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- Form Group for Prioritario --}}
        <div class="form-group form-check">
            {{ Form::checkbox('prioritario', 1, $producto->prioritario, ['class' => 'form-check-input', 'id' => 'prioritario']) }}
            {{ Form::label('prioritario', 'Prioritario', ['class' => 'form-check-label']) }}
            {!! $errors->first('prioritario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- Form Group for Disponible --}}
        <div class="form-group form-check">
            {{ Form::checkbox('disponible', 1, $producto->disponible, ['class' => 'form-check-input', 'id' => 'disponible']) }}
            {{ Form::label('disponible', 'Disponible', ['class' => 'form-check-label']) }}
            {!! $errors->first('disponible', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- Form Group for Agotado --}}
        <div class="form-group form-check">
            {{ Form::checkbox('agotado', 1, $producto->agotado, ['class' => 'form-check-input', 'id' => 'agotado']) }}
            {{ Form::label('agotado', 'Agotado', ['class' => 'form-check-label']) }}
            {!! $errors->first('agotado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- Form Group for Tiene Tallas --}}
        <div class="form-group form-check">
            {{ Form::checkbox('tiene_tallas', 1, $producto->tiene_tallas, ['class' => 'form-check-input', 'id' => 'tiene_tallas']) }}
            {{ Form::label('tiene_tallas', 'Tiene Tallas', ['class' => 'form-check-label']) }}
            {!! $errors->first('tiene_tallas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- Form Group for Imagen --}}
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen', ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : '')]) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- Form Group for Imagen2 --}}
        <div class="form-group">
            {{ Form::label('imagen2') }}
            {{ Form::file('imagen2', ['class' => 'form-control' . ($errors->has('imagen2') ? ' is-invalid' : '')]) }}
            {!! $errors->first('imagen2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
