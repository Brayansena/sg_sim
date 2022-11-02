@extends('layouts.app')

@section('template_title')
    {{ $tipoDispositivo->name ?? 'Show Tipo Dispositivo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipo Dispositivo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-dispositivos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dispositivo:</strong>
                            {{ $tipoDispositivo->dispositivo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
