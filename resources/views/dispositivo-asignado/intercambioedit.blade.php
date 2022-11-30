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
                        <span class="card-title">Intercambio Dispositivo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dispositivos.intercambio.update', $dispositivo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        {{ Form::label('Activo a Cambiar') }}
                                        {{ Form::label('id', $dispositivo->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Activo']) }}
                                        {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('tipo_Dispositivo') }}
                                        {{ Form::label('tipoDispositivo', $dispositivo->tipoDispositivo, ['class' => 'form-control' . ($errors->has('tipoDispositivo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Dispositivo']) }}
                                        {!! $errors->first('tipoDispositivo', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Numero Acta') }}
                                        {{ Form::text('numeroActa','', ['class' => 'form-control' . ($errors->has('numeroActa') ? ' is-invalid' : ''), 'placeholder' => 'Numero Acta Salida']) }}
                                        {!! $errors->first('numeroActa', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Nuevo Activo') }}
                                        {{ Form::select('id_newActivo',$disponibles,'', ['class' => 'form-control' . ($errors->has('id_newActivo') ? ' is-invalid' : ''), 'placeholder' => 'Activo Nuevo']) }}
                                        {!! $errors->first('id_newActivo', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

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
