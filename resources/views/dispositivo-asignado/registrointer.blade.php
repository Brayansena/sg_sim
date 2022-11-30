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
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('dispositivos.registrointer') }}"  method="get" id="search">
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
                                        <th>Tipo de Dispositivo</th>
										<th>Activo viejo</th>
										<th>Cod&nbspPDV</th>
                                        <th>Nombre&nbspPDV</th>
                                        <th>Activo nuevo</th>
                                        <th>User Creador</th>
                                        <th>Fecha de Modificacion</th>

                                    </tr>
                                </thead>
                                    @foreach ($dispositivos as $dispositivo)

                                        <tr>
                                            <td>{{ $dispositivo->tipoDispositivo }}</td>
                                            <td>{{ $dispositivo->id_oldDispositivo }}</td>
											<td>{{ $dispositivo->id_puntoVenta }}</td>
											<td>{{ $dispositivo->nombrePdv }}</td>
											<td>{{ $dispositivo->id_newDispositivo }}</td>
                                            <td>{{ $dispositivo->name }}</td>
											<td>{{ $dispositivo->updated_at }}</td>

                                        </tr>

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
