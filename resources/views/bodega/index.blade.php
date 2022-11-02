@extends('layouts.app')

@section('template_title')
    bodega
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex;align-items: center;flex-direction: row-reverse;justify-content: space-between;padding: 10px 5px 5px;">
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('bodegas.index') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
                            <span style="font-size: 20px;">
                                {{ __('Asignar a Tecnico') }}
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

										<th>linea</th>
                                        <th>Usuario Asignado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($simcards as $simcard)
                                        <tr>
                                            <td>{{ $simcard->id }}</td>

											<td>{{ $simcard->linea }}</td>
                                            <td>{{ $simcard->name }}</td>

                                            <td>
                                                <form action="{{ route('bodegas.destroy',$simcard->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('bodegas.edit',$simcard->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $simcards->links() !!}
            </div>
        </div>
    </div>
@endsection
