<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Activo') }}
            {{ Form::text('id', $dispositivo->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Activo']) }}
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_Dispositivo') }}
            {{ Form::text('tipoDispositivo', $dispositivo->tipoDispositivo, ['class' => 'form-control' . ($errors->has('tipoDispositivo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Dispositivo']) }}
            {!! $errors->first('tipoDispositivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
       <div class="form-group">
            {{ Form::label('serial') }}
            {{ Form::text('serial', $dispositivo->serial, ['class' => 'form-control' . ($errors->has('serial') ? ' is-invalid' : ''), 'placeholder' => 'Serial']) }}
            {!! $errors->first('serial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $dispositivo->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cod_PDV') }}
            {{ Form::text('id_puntoVenta', $dispositivo->id_puntoVenta, ['class' => 'form-control' . ($errors->has('id_puntoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Cod PDV']) }}
            {!! $errors->first('id_puntoVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado',$dispositivo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero Acta') }}
            {{ Form::text('numeroActa', $dispositivo->numeroActa, ['class' => 'form-control' . ($errors->has('numeroActa') ? ' is-invalid' : ''), 'placeholder' => 'Numero Acta']) }}
            {!! $errors->first('numeroActa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('procesador') }}
            {{ Form::text('procesador', $dispositivo->procesador, ['class' => 'form-control' . ($errors->has('procesador') ? ' is-invalid' : ''), 'placeholder' => 'Procesador']) }}
            {!! $errors->first('procesador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ram') }}
            {{ Form::text('ram', $dispositivo->ram, ['class' => 'form-control' . ($errors->has('ram') ? ' is-invalid' : ''), 'placeholder' => 'Ram']) }}
            {!! $errors->first('ram', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('disco Duro') }}
            {{ Form::text('discoDuro', $dispositivo->discoDuro, ['class' => 'form-control' . ($errors->has('discoDuro') ? ' is-invalid' : ''), 'placeholder' => 'DiscoDuro']) }}
            {!! $errors->first('discoDuro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mac') }}
            {{ Form::text('mac', $dispositivo->mac, ['class' => 'form-control' . ($errors->has('mac') ? ' is-invalid' : ''), 'placeholder' => 'Mac']) }}
            {!! $errors->first('mac', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imei') }}
            {{ Form::text('imei', $dispositivo->imei, ['class' => 'form-control' . ($errors->has('imei') ? ' is-invalid' : ''), 'placeholder' => 'Imei']) }}
            {!! $errors->first('imei', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion') }}
            {{ Form::text('observacion', $dispositivo->observacion, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $dispositivo->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
