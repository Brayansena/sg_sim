@extends('layouts.app')

@section('template_title')
    Crear Dispositivo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Dispositivo</span>
                    </div>
                    <div class="card-body">
                        <form method="PUT" action="{{ route('dispositivos.eleccionado') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        {{ Form::label('tipo Dispositivo') }}
                                        {{ Form::text('tipoDispositivo',$tipoDispositivo, $dispositivo->id, ['class' => 'form-control' . ($errors->has('tipoDispositivo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Dispositivo']) }}
                                        {!! $errors->first('tipoDispositivo', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                <br>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
