@extends('layouts.app')

@section('template_title')
    Dispositivos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <div style="display: flex;align-items: center;flex-direction: row-reverse;justify-content: space-between;padding: 10px 5px 5px;">
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('dispositivos.registro') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
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
                                        <th>Id</th>
										<th>Estado</th>
                                        <th>Modelo</th>
                                        <th>Activo</th>
										<th>Tipo&nbspDispositivo</th>
										<th>Cod&nbspPDV</th>
                                        <th>Nombre&nbspPdv</th>
										<th>Numero&nbspActa</th>



                                        <th>User&nbspAsignado</th>
										<th>Modificado&nbspPor</th>
										<th>Ultima&nbspmodificacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                    @foreach ($dispositivos as $dispositivo)
                                    @foreach ($users[$dispositivo->id_userCreador=$dispositivo->id_userCreador-1] as $user)

                                        <tr>
                                            <td>{{ $dispositivo->id }}</td>
											<td>{{ $dispositivo->registro }}</td>
                                            <td>{{ $dispositivo->modelo }}</td>
											<td>{{ $dispositivo->id_dispositivo }}</td>
											<td>{{ $dispositivo->tipoDispositivo }}</td>
											<td>{{ $dispositivo->id_puntoVenta }}</td>
											<td>{{ $dispositivo->nombrePdv }}</td>
											<td>{{ $dispositivo->numeroActa }}</td>

                                            <td>{{ $dispositivo->name }}</td>

                                            <td>{{ $user }}</td>


                                            <td>{{ $dispositivo->updated_at }}</td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $dispositivos->links() !!}
            </div>
        </div>
    </div>
@endsection
