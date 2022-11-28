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
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('intercambio.index') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
                            <span style="font-size: 20px;">
                                {{ __('Simcards Asignadas') }}
                            </span>
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
                                        <th>Cod Simcard</th>

										<th>Observaciones</th>
										<th>Linea</th>
										<th>Punto Venta</th>
                                        <th>Conexion</th>
										<th>User Creador</th>
										<th>Estado</th>
										<th>Fecha Registro</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($simcardsAsignadas as $simcardsAsignada)
                                        <tr>
                                            <td>{{ $simcardsAsignada->id_simcard }}</td>

											<td>{{ $simcardsAsignada->observaciones }}</td>
											<td>{{ $simcardsAsignada->linea }}</td>
											<td>{{ $simcardsAsignada->nombrePdv }}</td>
											<td>{{ $simcardsAsignada->conexion }}</td>
											<td>{{ $simcardsAsignada->name }}</td>
											<td>{{ $simcardsAsignada->estado }}</td>
											<td>{{ $simcardsAsignada->fechaRegistro }}</td>

                                            <td>

                                                <a class="btn btn-sm btn-success" href="{{ route('intercambio.edit',$simcardsAsignada->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $simcardsAsignadas->links() !!}
            </div>
        </div>
    </div>
@endsection
