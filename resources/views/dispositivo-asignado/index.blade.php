@extends('layouts.app')

@section('template_title')
    Dispositivo Asignado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dispositivo Asignado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('dispositivo-asignados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Registro</th>
										<th>Id Puntoventa</th>
										<th>Id Dispositivo</th>
										<th>Id Usercreador</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dispositivoAsignados as $dispositivoAsignado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $dispositivoAsignado->registro }}</td>
											<td>{{ $dispositivoAsignado->id_puntoVenta }}</td>
											<td>{{ $dispositivoAsignado->id_dispositivo }}</td>
											<td>{{ $dispositivoAsignado->id_userCreador }}</td>

                                            <td>
                                                <form action="{{ route('dispositivo-asignados.destroy',$dispositivoAsignado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dispositivo-asignados.show',$dispositivoAsignado->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('dispositivo-asignados.edit',$dispositivoAsignado->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $dispositivoAsignados->links() !!}
            </div>
        </div>
    </div>
@endsection
