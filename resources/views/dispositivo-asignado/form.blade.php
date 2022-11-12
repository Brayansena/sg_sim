<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('registro') }}
            {{ Form::text('registro', $dispositivoAsignado->registro, ['class' => 'form-control' . ($errors->has('registro') ? ' is-invalid' : ''), 'placeholder' => 'Registro']) }}
            {!! $errors->first('registro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_puntoVenta') }}
            {{ Form::text('id_puntoVenta', $dispositivoAsignado->id_puntoVenta, ['class' => 'form-control' . ($errors->has('id_puntoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Id Puntoventa']) }}
            {!! $errors->first('id_puntoVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_dispositivo') }}
            {{ Form::text('id_dispositivo', $dispositivoAsignado->id_dispositivo, ['class' => 'form-control' . ($errors->has('id_dispositivo') ? ' is-invalid' : ''), 'placeholder' => 'Id Dispositivo']) }}
            {!! $errors->first('id_dispositivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_userCreador') }}
            {{ Form::text('id_userCreador', $dispositivoAsignado->id_userCreador, ['class' => 'form-control' . ($errors->has('id_userCreador') ? ' is-invalid' : ''), 'placeholder' => 'Id Usercreador']) }}
            {!! $errors->first('id_userCreador', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>