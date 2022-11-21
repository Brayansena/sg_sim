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
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('dispositivos.index') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
                            <span style="font-size: 20px;">
                                {{ __('Dispositivos') }}
                                <h4 class="text-primary">Total {{ $dispositivoc->count() }}</h4>
                            </span>
                        </div>
                        <div style="display: flex;justify-content: space-between;align-items: center;flex-direction: row-reverse;padding: 5px 5px 1px;">
                             <div style="display: flex;flex-direction: row;">
                                <a href="{{ route('dispositivos.exportar') }}" class="btn btn-warning btn-sm2 float-right"  data-placement="left">
                                    {{ __('Exportar') }}
                                  </a>
                                <a href="{{ route('dispositivos.create') }}" class="btn btn-primary btn-sm2 float-right"  data-placement="left">
                                  {{ __('Crear') }}
                                </a>
                              </div>
                              @if(@Auth::user()->hasRole('inventario'))
                              <form style="display: flex;flex-direction: row-reverse" action="{{ route('dispositivos.importar') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="file-select" id="src-file1" >
                                    <input type="file" class="" name="file" aria-label="Archivo" required>
                                  </div>

                                  <button type="submit" class="btn btn-primary btn-sm2 float-right">Importar</button>
                                </form>
                              @endif

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
                                <tbody>
                                    @foreach ($dispositivos as $dispositivo)
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
											<td>{{ $dispositivo->id_userCreador }}</td>
                                            <td>{{ $dispositivo->updated_at }}</td>

                                            <td>
                                                <form class="eliminar" action="{{ route('dispositivos.destroy',$dispositivo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('dispositivos.edit',$dispositivo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @if(@Auth::user()->hasRole('inventario'))
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    @endif
                                                </form>
                                            </td>
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
