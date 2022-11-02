@extends('layouts.app')

@section('template_title')
    Crear Dispositivo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Intercambio Sims</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('intercambio.update', $simcardsAsignada->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('Cod Simcard') }}
                                        {{ Form::label('id_oldSimcard',$simcardsAsignada->id_simcard, ['class' => 'form-control' . ($errors->has('id_oldSimcard') ? ' is-invalid' : ''), 'placeholder' => 'Cod Simcard']) }}
                                        {!! $errors->first('id_oldSimcard', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Nueva Simcard') }}
                                        {{ Form::select('id_newSimcard',$simcards,$simcardsAsignada->null, ['class' => 'form-control' . ($errors->has('id_newSimcard') ? ' is-invalid' : ''), 'placeholder' => 'Nueva Simcard']) }}
                                        {!! $errors->first('id_newSimcard', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>
                                <br>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
