@extends('layouts.app')

@section('template_title')
    Crear Dispositivo
@endsection

@section('content')

<?php
if (isset($_GET["tipo"])) {
    $tipo = $_GET["tipo"];
    echo $tipo;
} else {
}
?>
@if ($tipo == '0')

<form action="index.php" method="post" class="content container-fluid">

    Selecione:
    <select id="status" name="status" onChange="mostrar(this.value);">
        <option value='tipo'>seleciona</option>
        @foreach ($tipoDispositivos as $tipoDispositivo)
        <option value='{{ $tipoDispositivo->dispositivo }}'>{{ $tipoDispositivo->dispositivo }}</option>
        @endforeach
     </select>
</form>
@elseif($tipo != 'sensor'&&$tipo != 'otro')
<div>
    <div class="col-md-12">
        @includeif('partials.errors')
        <div class="card card-default">
            <div class="card-body">
                    <h2></h2>
                    <form method="POST" action="{{ route('dispositivos.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                                <div class="form-group">
                                    {{ Form::label('tipo_Dispositivo') }}
                                    {{ Form::text('tipoDispositivo', $tipo, ['class' => 'form-control' . ($errors->has('tipoDispositivo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Dispositivo']) }}
                                    {!! $errors->first('tipoDispositivo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @if ($tipo == 'pda')
                                <div class="form-group">
                                    {{ Form::label('modelo') }}
                                    {{ Form::select('modelo', $pda,'', ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
                                    {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @elseif($tipo == 'impresora')
                                <div class="form-group">
                                    {{ Form::label('modelo') }}
                                    {{ Form::select('modelo', $impresora,'', ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
                                    {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @elseif($tipo == 'router')
                                <div class="form-group">
                                    {{ Form::label('modelo') }}
                                    {{ Form::select('modelo', $router,'', ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
                                    {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @else
                                <div class="form-group">
                                    {{ Form::label('modelo') }}
                                    {{ Form::text('modelo','', ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
                                    {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @endif

                                <div class="form-group">
                                    {{ Form::label('estado') }}
                                    {{ Form::select('estado',$estado,'Disponible', ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('serial') }}
                                    {{ Form::text('serial', '', ['class' => 'form-control' . ($errors->has('serial') ? ' is-invalid' : ''), 'placeholder' => 'Serial']) }}
                                    {!! $errors->first('serial', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Cod_PDV') }}
                                    {{ Form::text('id_puntoVenta', '1', ['class' => 'form-control' . ($errors->has('id_puntoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Cod PDV']) }}
                                    {!! $errors->first('id_puntoVenta', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @if ($tipo == 'torre'||$tipo == 'todo en uno'||$tipo == 'mini torre'||$tipo == 'portatil')

                                <div class="form-group">
                                    {{ Form::label('procesador') }}
                                    {{ Form::text('procesador', '', ['class' => 'form-control' . ($errors->has('procesador') ? ' is-invalid' : ''), 'placeholder' => 'Procesador']) }}
                                    {!! $errors->first('procesador', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('ram') }}
                                    {{ Form::text('ram', '', ['class' => 'form-control' . ($errors->has('ram') ? ' is-invalid' : ''), 'placeholder' => 'Ram']) }}
                                    {!! $errors->first('ram', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('disco Duro') }}
                                    {{ Form::text('discoDuro', '', ['class' => 'form-control' . ($errors->has('discoDuro') ? ' is-invalid' : ''), 'placeholder' => 'Disco Duro']) }}
                                    {!! $errors->first('discoDuro', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @else
                                @endif
                                @if ($tipo == 'pda')
                                <div class="form-group">
                                    {{ Form::label('mac') }}
                                    {{ Form::text('mac', '', ['class' => 'form-control' . ($errors->has('mac') ? ' is-invalid' : ''), 'placeholder' => 'Mac']) }}
                                    {!! $errors->first('mac', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('imei') }}
                                    {{ Form::text('imei', '', ['class' => 'form-control' . ($errors->has('imei') ? ' is-invalid' : ''), 'placeholder' => 'Imei']) }}
                                    {!! $errors->first('imei', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @else

                                @endif
                                <div class="form-group">
                                    {{ Form::label('User Asignado') }}
                                    {{ Form::select('id_userAsignado', $users,3, ['class' => 'form-control' . ($errors->has('id_userAsignado') ? ' is-invalid' : ''), 'placeholder' => 'User Asignado']) }}
                                    {!! $errors->first('id_userAsignado', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('observacion') }}
                                    {{ Form::text('observacion', '', ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
                                    {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('numero Acta') }}
                                    {{ Form::text('numeroActa', '', ['class' => 'form-control' . ($errors->has('numeroActa') ? ' is-invalid' : ''), 'placeholder' => 'Numero Acta']) }}
                                    {!! $errors->first('numeroActa', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Activo') }}
                                    {{ Form::text('id', '', ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Activo']) }}
                                    {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <br>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@elseif($tipo == 'sensor'||$tipo == 'boton de panico')
<div>
    <div class="col-md-12">
        @includeif('partials.errors')
        <div class="card card-default">
            <div class="card-body">
                    <h2></h2>
                    <form method="POST" action="{{ route('dispositivos.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                                <div class="form-group">
                                    {{ Form::label('tipo_Dispositivo') }}
                                    {{ Form::text('tipoDispositivo', $tipo, ['class' => 'form-control' . ($errors->has('tipoDispositivo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Dispositivo']) }}
                                    {!! $errors->first('tipoDispositivo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('modelo') }}
                                    {{ Form::text('modelo', '', ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
                                    {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('estado') }}
                                    {{ Form::select('estado',$estado,'', ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Cod_PDV') }}
                                    {{ Form::text('id_puntoVenta', '1', ['class' => 'form-control' . ($errors->has('id_puntoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Cod PDV']) }}
                                    {!! $errors->first('id_puntoVenta', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('User Asignado') }}
                                    {{ Form::select('id_userAsignado', $users,3, ['class' => 'form-control' . ($errors->has('id_userAsignado') ? ' is-invalid' : ''), 'placeholder' => 'User Asignado']) }}
                                    {!! $errors->first('id_userAsignado', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('numero Acta') }}
                                    {{ Form::text('numeroActa', '', ['class' => 'form-control' . ($errors->has('numeroActa') ? ' is-invalid' : ''), 'placeholder' => 'Numero Acta']) }}
                                    {!! $errors->first('numeroActa', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('cantidad') }}
                                    {{ Form::text('cantidad', '', ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                                    {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Activo') }}
                                    {{ Form::text('id', '', ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Activo']) }}
                                    {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <br>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@elseif($tipo == 'otro')
<div>
    <div class="col-md-12">
        @includeif('partials.errors')
        <div class="card card-default">
            <div class="card-body">
                    <h2></h2>
                    <form method="POST" action="{{ route('dispositivos.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                {{ Form::label('tipo_Dispositivo') }}
                                {{ Form::text('tipoDispositivo', $tipo, ['class' => 'form-control' . ($errors->has('tipoDispositivo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Dispositivo']) }}
                                {!! $errors->first('tipoDispositivo', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                           <div class="form-group">
                                {{ Form::label('serial') }}
                                {{ Form::text('serial', '', ['class' => 'form-control' . ($errors->has('serial') ? ' is-invalid' : ''), 'placeholder' => 'Serial']) }}
                                {!! $errors->first('serial', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('modelo') }}
                                {{ Form::text('modelo', '', ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
                                {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Cod_PDV') }}
                                {{ Form::text('id_puntoVenta', '1', ['class' => 'form-control' . ($errors->has('id_puntoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Cod PDV']) }}
                                {!! $errors->first('id_puntoVenta', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('estado') }}
                                {{ Form::select('estado',$estado,'', ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('numero Acta') }}
                                {{ Form::text('numeroActa', '', ['class' => 'form-control' . ($errors->has('numeroActa') ? ' is-invalid' : ''), 'placeholder' => 'Numero Acta']) }}
                                {!! $errors->first('numeroActa', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('procesador') }}
                                {{ Form::text('procesador', '', ['class' => 'form-control' . ($errors->has('procesador') ? ' is-invalid' : ''), 'placeholder' => 'Procesador']) }}
                                {!! $errors->first('procesador', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('ram') }}
                                {{ Form::text('ram', '', ['class' => 'form-control' . ($errors->has('ram') ? ' is-invalid' : ''), 'placeholder' => 'Ram']) }}
                                {!! $errors->first('ram', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('disco Duro') }}
                                {{ Form::text('discoDuro', '', ['class' => 'form-control' . ($errors->has('discoDuro') ? ' is-invalid' : ''), 'placeholder' => 'DiscoDuro']) }}
                                {!! $errors->first('discoDuro', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('User Asignado') }}
                                {{ Form::select('id_userAsignado', $users,3, ['class' => 'form-control' . ($errors->has('id_userAsignado') ? ' is-invalid' : ''), 'placeholder' => 'User Asignado']) }}
                                {!! $errors->first('id_userAsignado', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('mac') }}
                                {{ Form::text('mac', '', ['class' => 'form-control' . ($errors->has('mac') ? ' is-invalid' : ''), 'placeholder' => 'Mac']) }}
                                {!! $errors->first('mac', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('imei') }}
                                {{ Form::text('imei', '', ['class' => 'form-control' . ($errors->has('imei') ? ' is-invalid' : ''), 'placeholder' => 'Imei']) }}
                                {!! $errors->first('imei', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('observacion') }}
                                {{ Form::text('observacion', '', ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
                                {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('cantidad') }}
                                {{ Form::text('cantidad', '', ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                                {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Activo') }}
                                {{ Form::text('id', '', ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Activo']) }}
                                {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                                <br>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endif
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    function mostrar(id) {
        if (id != 0) {
            window.location.href = window.location.href + "?tipo=" + id;
    }

    }
    </script>

@endsection
