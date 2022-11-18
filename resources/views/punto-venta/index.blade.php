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
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('punto-ventas.index') }}"  method="get" id="search">
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
                        <div style="display: flex;justify-content: space-between;align-items: center;flex-direction: row-reverse;padding: 5px 5px 1px;">
                             <div class="float-right" style="display: flex;flex-direction: row">
                                <a href="{{ route('punto-ventas.exportar') }}" class="btn btn-warning btn-sm2 float-right"  data-placement="left">
                                    {{ __('Exportar') }}
                                  </a>
                                <a href="{{ route('punto-ventas.create') }}" class="btn btn-primary btn-sm2 float-right"  data-placement="left">
                                  {{ __('Crear') }}
                                </a>
                              </div>
                            <form style="display: flex;flex-direction: row-reverse" action="{{ route('punto-ventas.importar') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="file-select" id="src-file1" >
                                    <input type="file" class="" name="file" aria-label="Archivo" required>
                                  </div>
                                  <button type="submit" class="btn btn-primary btn-sm2 float-right">Importar</button>

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
                                        <th>Estado</th>

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
                                            <td>{{ $puntoVenta->estado }}</td>

                                            <td>
                                                <form class="eliminar" action="{{ route('punto-ventas.destroy',$puntoVenta->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('punto-ventas.show',$puntoVenta->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a> --}}
                                                    <a class="btn btn-sm btn-primary" href="{{ route('punto-ventas.edit',$puntoVenta->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $puntoVentas->links() !!} --}}
            </div>
        </div>
    </div>

@endsection
