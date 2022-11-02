<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Nombre Punto Venta') }}
            {{ Form::text('nombrePdv', $puntoVenta->nombrePdv, ['class' => 'form-control' . ($errors->has('nombrePdv') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Punto Venta']) }}
            {!! $errors->first('nombrePdv', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $puntoVenta->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipio') }}
            {{ Form::select('municipio',$municipios , $puntoVenta->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'Municipio']) }}
            {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('zona') }}
            {{ Form::select('zona',$zonas, $puntoVenta->zona, ['class' => 'form-control' . ($errors->has('zona') ? ' is-invalid' : ''), 'placeholder' => 'Zona']) }}
            {!! $errors->first('zona', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('canal') }}
            {{ Form::select('canal',$canales, $puntoVenta->canal, ['class' => 'form-control' . ($errors->has('canal') ? ' is-invalid' : ''), 'placeholder' => 'Canal']) }}
            {!! $errors->first('canal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('conexion') }}
            {{ Form::select('conexion',$conexiones, $puntoVenta->conexion, ['class' => 'form-control' . ($errors->has('conexion') ? ' is-invalid' : ''), 'placeholder' => 'Conexion']) }}
            {!! $errors->first('conexion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jefeComercial') }}
            {{ Form::text('jefeComercial', $puntoVenta->jefeComercial, ['class' => 'form-control' . ($errors->has('jefeComercial') ? ' is-invalid' : ''), 'placeholder' => 'Jefecomercial']) }}
            {!! $errors->first('jefeComercial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ccCordinador') }}
            {{ Form::text('ccCordinador', $puntoVenta->ccCordinador, ['class' => 'form-control' . ($errors->has('ccCordinador') ? ' is-invalid' : ''), 'placeholder' => 'Cccordinador']) }}
            {!! $errors->first('ccCordinador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cordinador') }}
            {{ Form::text('cordinador', $puntoVenta->cordinador, ['class' => 'form-control' . ($errors->has('cordinador') ? ' is-invalid' : ''), 'placeholder' => 'Cordinador']) }}
            {!! $errors->first('cordinador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ccLider') }}
            {{ Form::text('ccLider', $puntoVenta->ccLider, ['class' => 'form-control' . ($errors->has('ccLider') ? ' is-invalid' : ''), 'placeholder' => 'Cclider']) }}
            {!! $errors->first('ccLider', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lider') }}
            {{ Form::text('lider', $puntoVenta->lider, ['class' => 'form-control' . ($errors->has('lider') ? ' is-invalid' : ''), 'placeholder' => 'Lider']) }}
            {!! $errors->first('lider', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
