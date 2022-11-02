@extends('layouts.app')

@section('template_title')
    Actualizar Punto Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Punto Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('punto-ventas.update', $puntoVenta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="form-group">
                                {{ Form::label('Cod Punto Venta') }}
                                {{ Form::label('id', $puntoVenta->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Cod Punto Venta']) }}
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
