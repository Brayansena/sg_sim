@extends('layouts.app')

@section('template_title')
    Simcard
@endsection

@section('content')<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex;align-items: center;flex-direction: row-reverse;justify-content: space-between;padding: 10px 5px 5px;">
                        <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('simcards.consulta') }}"  method="get" id="search">
                          <div class="">
                              <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                            </div>
                          <div class="">
                            <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                          </div>
                        </form>
                        <span style="font-size: 20px;">
                            {{ __('Simcard') }}
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

                                    <th>linea</th>
                                    <th>Apn</th>
                                    <th>Usuario</th>
                                    <th>Clave</th>
                                    <th>Plan Asignado</th>
                                    <th>Fecha Corte</th>
                                    <th>Estado</th>
                                    <th>Usuario Asignado</th>
                                    <th>Operador</th>
                                    <th>Modificado Por</th>
                                    <th>Ultima Modificacion</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($simcards as $simcard)
                                @foreach ($users[$simcard->id_userCreador=$simcard->id_userCreador-1] as $user)
                                    <tr>
                                        <td>{{ $simcard->id }}</td>

                                        <td>{{ $simcard->linea }}</td>
                                        <td>{{ $simcard->apn }}</td>
                                        <td>{{ $simcard->usuario }}</td>
                                        <td>{{ $simcard->clave }}</td>
                                        <td>{{ $simcard->planAsignado }}</td>
                                        <td>{{ $simcard->fechaCorte }}</td>
                                        <td>{{ $simcard->estado }}</td>
                                        <td>{{ $simcard->name }}</td>
                                        <td>{{ $simcard->operador }}</td>
                                        <td>{{ $user }}</td>
                                        <td>{{ $simcard->updated_at }}</td>


                                    </tr>
                                    @endforeach
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
