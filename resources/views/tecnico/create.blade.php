@extends('layouts.app')

@section('template_title')
    Create bodega
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create bodega</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bodegas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('linea') }}
                                        {{ Form::text('linea', $simcard->linea, ['class' => 'form-control' . ($errors->has('linea') ? ' is-invalid' : ''), 'placeholder' => 'linea']) }}
                                        {!! $errors->first('linea', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('id_userAsignado') }}
                                        {{ Form::text('id_userAsignado', $simcard->id_userAsignado, ['class' => 'form-control' . ($errors->has('id_userAsignado') ? ' is-invalid' : ''), 'placeholder' => 'Id User Asignado']) }}
                                        {!! $errors->first('id_userAsignado', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
