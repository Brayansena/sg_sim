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
                    @if ($user->id == 1)
                        No disponible
                    @else
                    <p class="h5">Nombre</p>
                    <p class="form-control">{{ $user->name }}</p>
                    <h2 class="h5">listado de Roles</h2>
                    {!! Form::model($user, ['route' => ['users.update',$user],'method'=>'put']) !!}
                        @foreach ($roles as $role)
                            <div>
                                @if ($role->id <= 3)

                                @else
                                <label>
                                    {!! Form::checkbox('roles[]',$role->id,null, ['class'=>'mr-1']) !!}

                                    {{ $role->name }}
                                </label>
                                @endif
                            </div>

                        @endforeach
                        <br>
                        {!! Form::submit('Asignar rol',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

