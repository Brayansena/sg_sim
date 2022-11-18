@extends('layouts.app')

@section('template_title')
    Actualizar Dispositivo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Dispositivo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dispositivos.updateuser', $dispositivo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">

                                    <div class="form-group">
                                        {{ Form::label('User Asignado') }}
                                        {{ Form::select('id_userAsignado', $users,$dispositivo->id_userAsignado, ['class' => 'form-control' . ($errors->has('id_userAsignado') ? ' is-invalid' : ''), 'placeholder' => 'User Asignado']) }}
                                        {!! $errors->first('id_userAsignado', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('estado') }}
                                        {{ Form::select('estado',$estado,$dispositivo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                                        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('numero Acta') }}
                                        {{ Form::text('numeroActa', $dispositivo->numeroActa, ['class' => 'form-control' . ($errors->has('numeroActa') ? ' is-invalid' : ''), 'placeholder' => 'Numero Acta']) }}
                                        {!! $errors->first('numeroActa', '<div class="invalid-feedback">:message</div>') !!}
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
