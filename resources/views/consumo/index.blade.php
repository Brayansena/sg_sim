@extends('layouts.app')

@section('template_title')
    Consumo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex;align-items: center;flex-direction: row-reverse;justify-content: space-between;padding: 10px 5px 5px;">
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('consumos.index') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
                            <span style="font-size: 20px;">
                                {{ __('Consumo') }}
                            </span>
                        </div>
                        <div style="display: flex;justify-content: space-between;align-items: center;flex-direction: row-reverse;padding: 5px 5px 1px;">
                             <div class="float-right" style="display: flex;flex-direction: row">
                                <a href="{{ route('consumos.exportar') }}" class="btn btn-warning btn-sm2 float-right"  data-placement="left">
                                    {{ __('Exportar') }}
                                  </a>
                                <a href="{{ route('consumos.create') }}" class="btn btn-primary btn-sm2 float-right"  data-placement="left">
                                  {{ __('Crear') }}
                                </a>
                              </div>
                            <form style="display: flex;flex-direction: row-reverse" action="{{ route('consumos.importar') }}" method="post" enctype="multipart/form-data">
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
                                        <th>No</th>

										<th>Cod Simcards</th>
										<th>Consumo1</th>
										<th>Consumo2</th>
										<th>Consumo3</th>
										<th>Modificado Por</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consumos as $consumo)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $consumo->id_simcards }}</td>
											<td>{{ $consumo->consumo1 }}</td>
											<td>{{ $consumo->consumo2 }}</td>
											<td>{{ $consumo->consumo3 }}</td>
											<td>{{ $consumo->name }}</td>

                                            <td>
                                                <form class="eliminar" action="{{ route('consumos.destroy',$consumo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('consumos.edit',$consumo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $consumos->links() !!}
            </div>
        </div>
    </div>
@endsection
