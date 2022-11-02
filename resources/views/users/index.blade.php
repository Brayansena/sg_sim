@extends('layouts.app')

@section('template_title')
    Users
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Numero de Telefono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $users as $user )
                            <tr>
                                @if ($user->id<=3)
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a class="btn btn-primary" href="{{ route('users.password.edit',$user->id) }}">Cambiar Contraseña</a></td>
                                @else
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('users.password.edit',$user->id) }}">Cambiar Contraseña</a>
                                    <a class="btn btn-success" href="{{ route('users.edit',$user) }}">Editar</a>
                                </td>
                                @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

