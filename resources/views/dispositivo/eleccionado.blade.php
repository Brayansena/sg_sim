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
                        <form method="PUT" action="{{ route('dispositivos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    {{$tipo}}

                                        <div class="form-group">
                                            {{ Form::label('Activo') }}
                                            {{ Form::text('id',$tipo, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Activo']) }}
                                            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('Activo') }}
                                            {{ Form::label('id',$tipo, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Activo']) }}
                                            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                   <div class="form-group">
                                        {{ Form::label('serial') }}
                                        {{ Form::text('serial',$tipo, ['class' => 'form-control' . ($errors->has('serial') ? ' is-invalid' : ''), 'placeholder' => 'Serial']) }}
                                        {!! $errors->first('serial', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('modelo') }}
                                        {{ Form::text('modelo',$tipo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
                                        {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('descripcion') }}
                                        {{ Form::text('descripcion',$tipo, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Cod_PDV') }}
                                        {{ Form::text('id_puntoVenta',$tipo, ['class' => 'form-control' . ($errors->has('id_puntoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Cod PDV']) }}
                                        {!! $errors->first('id_puntoVenta', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('estado') }}
                                        {{ Form::text('estado',$tipo, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                                        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('cedula Responsable') }}
                                        {{ Form::text('cedulaResponsable',$tipo, ['class' => 'form-control' . ($errors->has('cedulaResponsable') ? ' is-invalid' : ''), 'placeholder' => 'Cedula Responsable']) }}
                                        {!! $errors->first('cedulaResponsable', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('responsable') }}
                                        {{ Form::text('responsable',$tipo, ['class' => 'form-control' . ($errors->has('responsable') ? ' is-invalid' : ''), 'placeholder' => 'Responsable']) }}
                                        {!! $errors->first('responsable', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('User Asignado') }}
                                        {{ Form::date('fechaAsignacion',$tipo, ['class' => 'form-control' . ($errors->has('id_userAsignado') ? ' is-invalid' : ''), 'placeholder' => 'User Asignado']) }}
                                        {!! $errors->first('id_userAsignado', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('fecha Asignacion') }}
                                        {{ Form::date('fechaAsignacion',$tipo, ['class' => 'form-control' . ($errors->has('fechaAsignacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Asignacion']) }}
                                        {!! $errors->first('fechaAsignacion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('numero Acta') }}
                                        {{ Form::text('numeroActa',$tipo, ['class' => 'form-control' . ($errors->has('numeroActa') ? ' is-invalid' : ''), 'placeholder' => 'Numero Acta']) }}
                                        {!! $errors->first('numeroActa', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('procesador') }}
                                        {{ Form::text('procesador',$tipo, ['class' => 'form-control' . ($errors->has('procesador') ? ' is-invalid' : ''), 'placeholder' => 'Procesador']) }}
                                        {!! $errors->first('procesador', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('ram') }}
                                        {{ Form::text('ram',$tipo, ['class' => 'form-control' . ($errors->has('ram') ? ' is-invalid' : ''), 'placeholder' => 'Ram']) }}
                                        {!! $errors->first('ram', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('procesador') }}
                                        {{ Form::text('procesador',$tipo, ['class' => 'form-control' . ($errors->has('procesador') ? ' is-invalid' : ''), 'placeholder' => 'Procesador']) }}
                                        {!! $errors->first('procesador', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('disco Duro') }}
                                        {{ Form::text('discoDuro',$tipo, ['class' => 'form-control' . ($errors->has('discoDuro') ? ' is-invalid' : ''), 'placeholder' => 'DiscoDuro']) }}
                                        {!! $errors->first('discoDuro', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('mac') }}
                                        {{ Form::text('mac',$tipo, ['class' => 'form-control' . ($errors->has('mac') ? ' is-invalid' : ''), 'placeholder' => 'Mac']) }}
                                        {!! $errors->first('mac', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('imei') }}
                                        {{ Form::text('imei',$tipo, ['class' => 'form-control' . ($errors->has('imei') ? ' is-invalid' : ''), 'placeholder' => 'Imei']) }}
                                        {!! $errors->first('imei', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('observacion') }}
                                        {{ Form::text('observacion',$tipo, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
                                        {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('cantidad') }}
                                        {{ Form::text('cantidad',$tipo, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                                        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    {{-- @else

                                    @endif --}}

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
