<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Cod Simcard') }}
            {{ Form::text('id_simcards', $consumo->id_simcards, ['class' => 'form-control' . ($errors->has('id_simcards') ? ' is-invalid' : ''), 'placeholder' => 'Cod Simcard']) }}
            {!! $errors->first('id_simcards', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('consumo1') }}
            {{ Form::text('consumo1', $consumo->consumo1, ['class' => 'form-control' . ($errors->has('consumo1') ? ' is-invalid' : ''), 'placeholder' => 'Consumo1']) }}
            {!! $errors->first('consumo1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('consumo2') }}
            {{ Form::text('consumo2', $consumo->consumo2, ['class' => 'form-control' . ($errors->has('consumo2') ? ' is-invalid' : ''), 'placeholder' => 'Consumo2']) }}
            {!! $errors->first('consumo2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('consumo3') }}
            {{ Form::text('consumo3', $consumo->consumo3, ['class' => 'form-control' . ($errors->has('consumo3') ? ' is-invalid' : ''), 'placeholder' => 'Consumo3']) }}
            {!! $errors->first('consumo3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
