@extends('layouts.app')

@section('template_title')
    {{ $dispositivo->name ?? 'Show Dispositivo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Dispositivo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dispositivos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $dispositivo->marca }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $dispositivo->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tipodispositivo:</strong>
                            {{ $dispositivo->tipoDispositivo }}
                        </div>
                        <div class="form-group">
                            <strong>Serial:</strong>
                            {{ $dispositivo->serial }}
                        </div>
                        <div class="form-group">
                            <strong>Id Puntoventa:</strong>
                            {{ $dispositivo->id_puntoVenta }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $dispositivo->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Cedularesponsable:</strong>
                            {{ $dispositivo->cedulaResponsable }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable:</strong>
                            {{ $dispositivo->responsable }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaasignacion:</strong>
                            {{ $dispositivo->fechaAsignacion }}
                        </div>
                        <div class="form-group">
                            <strong>Numeroacta:</strong>
                            {{ $dispositivo->numeroActa }}
                        </div>
                        <div class="form-group">
                            <strong>Mac:</strong>
                            {{ $dispositivo->mac }}
                        </div>
                        <div class="form-group">
                            <strong>Imei:</strong>
                            {{ $dispositivo->imei }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad:</strong>
                            {{ $dispositivo->capacidad }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $dispositivo->observacion }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usercreador:</strong>
                            {{ $dispositivo->id_userCreador }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
