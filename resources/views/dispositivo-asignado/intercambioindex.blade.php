@extends('layouts.app')

@section('template_title')
    Simcards Asignada
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex;align-items: center;flex-direction: row-reverse;justify-content: space-between;padding: 10px 5px 5px;">
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('dispositivos.intercambioindex') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
                            <span style="font-size: 20px;">
                                {{ __('Dispositivos Asignados') }}
                            </span>
                        </div>
                        <div style="display: flex;justify-content: space-between;align-items: center;flex-direction: row-reverse;padding: 5px 5px 1px;">
                            <div style="display: flex;flex-direction: row" class="float-right">
                               <a href="{{ route('dispositivos.salida') }}" class="btn btn-warning btn-sm2 float-right"  data-placement="left">
                                   {{ __('Activo Salida') }}
                                 </a>
                               <a href="{{ route('dispositivos.entrada') }}" class="btn btn-primary btn-sm2 float-right"  data-placement="left">
                                 {{ __('Activo Entrada') }}
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
                                        <th>Disco&nbspDuro</th>
										<th>Mac</th>
										<th>Imei</th>
                                        <th>Cantidad</th>



                                        <th>User&nbspAsignado</th>
										<th>Observacion</th>
										<th>Modificado&nbspPor</th>
										<th>Ultima&nbspmodificacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                    @foreach ($dispositivos as $dispositivo)
                                    @foreach ($users[$dispositivo->id_userCreador=$dispositivo->id_userCreador-1] as $user)

                                        <tr>
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

                                            <td>{{ $user }}</td>


                                            <td>{{ $dispositivo->updated_at }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ route('dispositivos.intercambio.edit',$dispositivo->id) }}"><i class="fa fa-fw fa-edit"></i> Intercambio</a>
                                            </td>
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
