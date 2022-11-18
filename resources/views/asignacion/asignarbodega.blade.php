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
                        <div style="display: flex;align-items: center;justify-content: space-between;padding: 10px 5px 5px;">
                            <span style="font-size: 20px;">
                                {{ __('Asignar a Bodega') }}
                            </span>
                            <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('asignar.bodega') }}"  method="get" id="search">
                              <div class="">
                                  <input type="submit" class="btn btn-dark btn-sm2" value="Buscar">
                                </div>
                              <div class="">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                              </div>
                            </form>
                        </div>
                        <form method="POST" action="{{ route('asignar.bodega.asignado') }}">
                            {{ csrf_field() }}
                            <div style="display: flex;justify-content: space-between;align-items: center;flex-direction: row-reverse;padding: 5px 5px 1px;">
                            <div class="float-right">
                                <input type="submit" class="btn btn-primary waves-effect" value="Asignar a Bodega">
                            </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" style="width: 100% !important">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Cod Simcard</th>
                                        <th>linea</th>
                                        <th>Usuario Asignado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $simcards as $simcard )
                                    <tr>
                                        <td>
                                            <input type="radio" value="{{ $simcard->id }}" id="{{ $simcard->id }}" name="asignando[]" required>
                                        </td>
                                        <td>{{ $simcard->id }}</td>
                                        <td>{{ $simcard->linea }}</td>
                                        <td>{{ $simcard->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
