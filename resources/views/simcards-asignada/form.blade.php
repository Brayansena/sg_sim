<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $simcardsAsignada->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cod_simcard') }}
            {{ Form::select('id_simcard',$simcards, $simcardsAsignada->id_simcard, ['class' => 'form-control' . ($errors->has('id_simcard') ? ' is-invalid' : ''), 'placeholder' => 'Cod Simcard']) }}
            {!! $errors->first('id_simcard', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cod_puntoVenta') }}
            {{ Form::text('id_puntoVenta', $simcardsAsignada->id_puntoVenta, ['class' => 'form-control' . ($errors->has('id_puntoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Cod Punto Venta']) }}
            {!! $errors->first('id_puntoVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
