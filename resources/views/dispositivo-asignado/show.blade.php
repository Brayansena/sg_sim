@extends('layouts.app')

@section('template_title')
    {{ $dispositivoAsignado->name ?? 'Show Dispositivo Asignado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Dispositivo Asignado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dispositivo-asignados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Registro:</strong>
                            {{ $dispositivoAsignado->registro }}
                        </div>
                        <div class="form-group">
                            <strong>Id Puntoventa:</strong>
                            {{ $dispositivoAsignado->id_puntoVenta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Dispositivo:</strong>
                            {{ $dispositivoAsignado->id_dispositivo }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usercreador:</strong>
                            {{ $dispositivoAsignado->id_userCreador }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
