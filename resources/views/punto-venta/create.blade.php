@extends('layouts.app')

@section('template_title')
    Crear Punto Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Punto Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('punto-ventas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                {{ Form::label('Cod Punto Venta') }}
                                {{ Form::text('id', $puntoVenta->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Cod Punto Venta']) }}
                                {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            @include('punto-venta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
