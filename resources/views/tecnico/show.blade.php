@extends('layouts.app')

@section('template_title')
    {{ $simcard->name ?? 'Show Simcard' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Simcard</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('simcards.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>linea:</strong>
                            {{ $simcard->linea }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $simcard->usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $simcard->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Corte:</strong>
                            {{ $simcard->fecha_corte }}
                        </div>
                        <div class="form-group">
                            <strong>Apn:</strong>
                            {{ $simcard->apn }}
                        </div>
                        <div class="form-group">
                            <strong>Plan Asig:</strong>
                            {{ $simcard->plan_asig }}
                        </div>
                        <div class="form-group">
                            <strong>Id User Asignado:</strong>
                            {{ $simcard->id_userAsignado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Operador:</strong>
                            {{ $simcard->id_operador }}
                        </div>
                        <div class="form-group">
                            <strong>Id User Registro:</strong>
                            {{ $simcard->id_userCreador }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
