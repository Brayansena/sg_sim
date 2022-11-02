@extends('layouts.app')

@section('template_title')
    Crear Simcard
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Simcard</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('simcards.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                {{ Form::label('Cod Simcard') }}
                                {{ Form::text('id', $simcard->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Cod Simcard']) }}
                                {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            @include('simcard.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
