@extends('layouts.app')

@section('template_title')
    Redes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex;align-items: center;flex-direction: row-reverse;justify-content: space-between;padding: 10px 5px 5px;">
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('redes.consulta') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
                            <span style="font-size: 20px;">
                                {{ __('Redes') }}
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
                                        <th>No</th>

										<th>Cod Punto Venta</th>
                                        <th>Nombre Punto Venta</th>
										<th>Nombre Nodo</th>
										<th>Ip Radio</th>
										<th>Ip Redlan</th>
										<th>Ip Equipo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($redes as $rede)
                                        <tr>
                                            <td>{{ $rede->id }}</td>

											<td>{{ $rede->id_puntoVenta }}</td>
                                            <td>{{ $rede->nombrePdv }}</td>
											<td>{{ $rede->nombreNodo }}</td>
											<td>{{ $rede->ip_radio }}</td>
											<td>{{ $rede->ip_redlan }}</td>
											<td>{{ $rede->ip_equipo }}</td>

                                            <td>
                                                <form action="{{ route('redes.destroy',$rede->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('redes.edit',$rede->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $redes->links() !!}
            </div>
        </div>
    </div>
@endsection
