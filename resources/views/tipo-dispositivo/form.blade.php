<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('dispositivo') }}
            {{ Form::text('dispositivo', $tipoDispositivo->dispositivo, ['class' => 'form-control' . ($errors->has('dispositivo') ? ' is-invalid' : ''), 'placeholder' => 'Dispositivo']) }}
            {!! $errors->first('dispositivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
</div>
