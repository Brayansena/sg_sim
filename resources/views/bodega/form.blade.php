@if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('linea') }}
            {{ Form::label('linea', $simcard->linea, ['class' => 'form-control' . ($errors->has('linea') ? ' is-invalid' : ''), 'placeholder' => 'linea']) }}
            {!! $errors->first('linea', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Usuario Asignado') }}
            {{ Form::select('id_userAsignado', $users,$simcard->id_userAsignado, ['class' => 'form-control' . ($errors->has('id_userAsignado') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Asignado']) }}
            {!! $errors->first('id_userAsignado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
