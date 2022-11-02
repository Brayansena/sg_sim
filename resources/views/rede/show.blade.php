@extends('layouts.app')

@section('template_title')
    {{ $rede->name ?? 'Show Rede' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Rede</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('redes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Puntoventa:</strong>
                            {{ $rede->id_puntoVenta }}
                        </div>
                        <div class="form-group">
                            <strong>Nombrenodo:</strong>
                            {{ $rede->nombreNodo }}
                        </div>
                        <div class="form-group">
                            <strong>Ip Radio:</strong>
                            {{ $rede->ip_radio }}
                        </div>
                        <div class="form-group">
                            <strong>Ip Redlan:</strong>
                            {{ $rede->ip_redlan }}
                        </div>
                        <div class="form-group">
                            <strong>Ip Equipo:</strong>
                            {{ $rede->ip_equipo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
