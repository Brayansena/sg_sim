<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Punto Venta') }}
            {{ Form::select('id_puntoVenta',$puntoVentas, $rede->id_puntoVenta, ['class' => 'form-control' . ($errors->has('id_puntoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Punto Venta']) }}
            {!! $errors->first('id_puntoVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre Nodo') }}
            {{ Form::text('nombreNodo', $rede->nombreNodo, ['class' => 'form-control' . ($errors->has('nombreNodo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Nodo']) }}
            {!! $errors->first('nombreNodo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ip_radio') }}
            {{ Form::text('ip_radio', $rede->ip_radio, ['class' => 'form-control' . ($errors->has('ip_radio') ? ' is-invalid' : ''), 'placeholder' => 'Ip Radio']) }}
            {!! $errors->first('ip_radio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ip_redlan') }}
            {{ Form::text('ip_redlan', $rede->ip_redlan, ['class' => 'form-control' . ($errors->has('ip_redlan') ? ' is-invalid' : ''), 'placeholder' => 'Ip Redlan']) }}
            {!! $errors->first('ip_redlan', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ip_equipo') }}
            {{ Form::text('ip_equipo', $rede->ip_equipo, ['class' => 'form-control' . ($errors->has('ip_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Ip Equipo']) }}
            {!! $errors->first('ip_equipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
