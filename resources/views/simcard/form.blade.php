<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('linea') }}
            {{ Form::text('linea', $simcard->linea, ['class' => 'form-control' . ($errors->has('linea') ? ' is-invalid' : ''), 'placeholder' => 'linea']) }}
            {!! $errors->first('linea', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apn') }}
            {{ Form::text('apn', $simcard->apn, ['class' => 'form-control' . ($errors->has('apn') ? ' is-invalid' : ''), 'placeholder' => 'Apn']) }}
            {!! $errors->first('apn', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usuario') }}
            {{ Form::text('usuario', $simcard->usuario, ['class' => 'form-control' . ($errors->has('usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
            {!! $errors->first('usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $simcard->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('plan Asignado') }}
            {{ Form::text('planAsignado', $simcard->planAsignado, ['class' => 'form-control' . ($errors->has('planAsignado') ? ' is-invalid' : ''), 'placeholder' => 'Plan Asignado']) }}
            {!! $errors->first('planAsignado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha Corte') }}
            {{ Form::text('fechaCorte', $simcard->fechaCorte, ['class' => 'form-control' . ($errors->has('fechaCorte') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Corte']) }}
            {!! $errors->first('fechaCorte', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Usuario Asignado') }}
            {{ Form::select('id_userAsignado', $users,$simcard->id_userAsignado, ['class' => 'form-control' . ($errors->has('id_userAsignado') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Asignado']) }}
            {!! $errors->first('id_userAsignado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('operador') }}
            {{ Form::text('operador', $simcard->operador, ['class' => 'form-control' . ($errors->has('operador') ? ' is-invalid' : ''), 'placeholder' => 'Operador']) }}
            {!! $errors->first('operador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
