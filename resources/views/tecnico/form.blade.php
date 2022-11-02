<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('linea') }}
            {{ Form::label('linea', $simcard->linea, ['class' => 'form-control' . ($errors->has('linea') ? ' is-invalid' : ''), 'placeholder' => 'linea']) }}
            {!! $errors->first('linea', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_punto_venta') }}
            {{ Form::text('id_punto_venta', $simcard->id_punto_venta, ['class' => 'form-control' . ($errors->has('id_punto_venta') ? ' is-invalid' : ''), 'placeholder' => 'Id User Asignado']) }}
            {!! $errors->first('id_punto_venta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
