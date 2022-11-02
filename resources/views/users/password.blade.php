@extends('layouts.app')

@section('template_title')
    Rol
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <p class="h5">Nombre</p>
                    <p class="form-control">{{ $user->name }}</p>
                    <form method="POST" action="{{ route('users.password', $user->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        <div class="form-group">
                            {{ Form::label('password') }}
                            {{ Form::text('password', '',['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
                            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Confirmar Password') }}
                            {{ Form::text('confirmpassword', '',['class' => 'form-control' . ($errors->has('confirmpassword') ? ' is-invalid' : ''), 'placeholder' => 'Confirmar Password']) }}
                            {!! $errors->first('confirmpassword', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                            <br>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

