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
                        <div style="display: flex;align-items: center;justify-content: space-between;padding: 10px 5px 5px;">
                            <span style="font-size: 20px;">
                                {{ __('Reasignacion') }}
                            </span>
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('dispositivos.asignar') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
                        </div>
                        <form method="POST" action="{{ route('dispositivos.asignado') }}">
                            {{ csrf_field() }}
                            <div style="display: flex;justify-content: space-between;align-items: center;flex-direction: row-reverse;padding: 5px 5px 1px;">
                            <div class="float-right">
                                <input type="submit" class="btn btn-primary waves-effect" value="Reasignar">
                            </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" style="width: 100% !important">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Modelo</th>
                                        <th>Activo</th>
										<th>Tipo&nbspDispositivo</th>
										<th>Serial</th>
										<th>Cod&nbspPDV</th>
                                        <th>Nombre&nbspPdv</th>
										<th>Estado</th>
										<th>Numero&nbspActa</th>
                                        <th>Procesador</th>
                                        <th>Ram</th>
                                        <th>Disco Duro</th>
										<th>Mac</th>
										<th>Imei</th>
                                        <th>Cantidad</th>
                                        <th>User&nbspAsignado</th>


										<th>Observacion</th>
										<th>Modificado&nbspPor</th>
										<th>Ultima&nbspmodificacion</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $dispositivos as $dispositivo )
                                    <tr>
                                        <td>
                                            <input type="radio" value="{{ $dispositivo->id }}" id="{{ $dispositivo->id }}" name="reasignar[]" required>
                                        </td>
                                        <td>{{ $dispositivo->modelo }}</td>
											<td>{{ $dispositivo->id }}</td>
											<td>{{ $dispositivo->tipoDispositivo }}</td>
											<td>{{ $dispositivo->serial }}</td>
											<td>{{ $dispositivo->id_puntoVenta }}</td>
											<td>{{ $dispositivo->nombrePdv }}</td>
											<td>{{ $dispositivo->estado }}</td>
											<td>{{ $dispositivo->numeroActa }}</td>
                                            <td>{{ $dispositivo->procesador }}</td>
                                            <td>{{ $dispositivo->ram }}</td>
                                            <td>{{ $dispositivo->discoDuro }}</td>
											<td>{{ $dispositivo->mac }}</td>
											<td>{{ $dispositivo->imei }}</td>
                                            <td>{{ $dispositivo->cantidad }}</td>
                                            <td>{{ $dispositivo->name }}</td>


											<td>{{ $dispositivo->observacion }}</td>
											<td>{{ $dispositivo->id_userCreador }}</td>
                                            <td>{{ $dispositivo->updated_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
