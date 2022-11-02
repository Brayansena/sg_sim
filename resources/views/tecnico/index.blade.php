@extends('layouts.app')

@section('template_title')
    simcard
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('bodega') }}
                            </span>
                            <div class="consearch">
                                <form action="{{route('tecnicos.index') }}"  method="get" id="search">
                                  <div class="">
                                      <input type="submit" class="btn btn-primary" value="buscar">
                                    </div>
                                  <div class="">
                                    <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                                  </div>
                                </form>
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
                                        <th>No</th>

										<th>linea</th>
                                        <th>id_userAsignado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($simcards as $simcard)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $simcard->linea }}</td>
                                            <td>{{ $simcard->id_userAsignado }}</td>

                                            <td>
                                                <form action="{{ route('tecnicos.destroy',$simcard->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tecnicos.show',$simcard->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tecnicos.edit',$simcard->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
