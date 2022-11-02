@extends('layouts.app')

@section('template_title')
   Actualizar Simcard
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Simcard</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('simcards.update', $simcard->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="form-group">
                                {{ Form::label('Cod Simcard') }}
                                {{ Form::label('id', $simcard->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Cod Simcard']) }}
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
