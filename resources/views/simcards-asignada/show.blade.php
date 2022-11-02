@extends('layouts.app')

@section('template_title')
    {{ $simcardsAsignada->name ?? 'Show Simcards Asignada' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Simcards Asignada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('simcards-asignadas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $simcardsAsignada->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Id Simcard:</strong>
                            {{ $simcardsAsignada->id_simcard }}
                        </div>
                        <div class="form-group">
                            <strong>Id Puntoventa:</strong>
                            {{ $simcardsAsignada->id_puntoVenta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usercreador:</strong>
                            {{ $simcardsAsignada->id_userCreador }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $simcardsAsignada->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Fecharegistro:</strong>
                            {{ $simcardsAsignada->fechaRegistro }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
