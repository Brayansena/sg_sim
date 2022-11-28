@extends('layouts.app')

@section('template_title')
    Asignar a PDV
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Activo de Entrada</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dispositivos.activoentradaasignado', $dispositivo->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">

                                <div class="form-group">
                                    {{ Form::label('Cod_PDV') }}
                                    {{ Form::text('id_puntoVenta', '', ['class' => 'form-control' . ($errors->has('id_puntoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Cod PDV']) }}
                                    {!! $errors->first('id_puntoVenta', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Activo') }}
                                    {{ Form::text('id','', ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Activo']) }}
                                    {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('numero Acta') }}
                                    {{ Form::text('numeroActa', '', ['class' => 'form-control' . ($errors->has('numeroActa') ? ' is-invalid' : ''), 'placeholder' => 'Acta de Entrada']) }}
                                    {!! $errors->first('numeroActa', '<div class="invalid-feedback">:message</div>') !!}
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
