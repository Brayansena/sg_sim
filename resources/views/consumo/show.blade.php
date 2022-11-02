@extends('layouts.app')

@section('template_title')
    {{ $consumo->name ?? 'Show Consumo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Consumo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('consumos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Simcards:</strong>
                            {{ $consumo->id_simcards }}
                        </div>
                        <div class="form-group">
                            <strong>Consumo1:</strong>
                            {{ $consumo->consumo1 }}
                        </div>
                        <div class="form-group">
                            <strong>Consumo2:</strong>
                            {{ $consumo->consumo2 }}
                        </div>
                        <div class="form-group">
                            <strong>Consumo3:</strong>
                            {{ $consumo->consumo3 }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usercreador:</strong>
                            {{ $consumo->id_userCreador }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
