@extends('layouts.app')

@section('template_title')
    Punto Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex;align-items: center;flex-direction: row-reverse;justify-content: space-between;padding: 10px 5px 5px;">
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('punto-ventas.consulta') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
                            <span style="font-size: 20px;">
                                {{ __('Punto Venta') }}
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
                                        <th>Cod</th>

										<th>Nombre Punto Venta</th>
										<th>Direccion</th>
										<th>Municipio</th>
										<th>Zona</th>
										<th>Canal</th>
										<th>Conexion</th>
										<th>Jefe Comercial</th>
										<th>Cc&nbspCordinador</th>
										<th>Cordinador</th>
										<th>Cc&nbspLider</th>
										<th>Lider</th>
										<th>User Creador</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puntoVentas as $puntoVenta)
                                        <tr>
                                            <td>{{ $puntoVenta->id }}</td>

											<td>{{ $puntoVenta->nombrePdv }}</td>
											<td>{{ $puntoVenta->direccion }}</td>
											<td>{{ $puntoVenta->municipio }}</td>
											<td>{{ $puntoVenta->zona }}</td>
											<td>{{ $puntoVenta->canal }}</td>
											<td>{{ $puntoVenta->conexion }}</td>
											<td>{{ $puntoVenta->jefeComercial }}</td>
											<td>{{ $puntoVenta->ccCordinador }}</td>
											<td>{{ $puntoVenta->cordinador }}</td>
											<td>{{ $puntoVenta->ccLider }}</td>
											<td>{{ $puntoVenta->lider }}</td>
											<td>{{ $puntoVenta->name }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $puntoVentas->links() !!}
            </div>
        </div>
    </div>
@endsection
