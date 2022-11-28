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
                    <div style="display: flex;align-items: center;flex-direction: row-reverse;justify-content: space-between;padding: 10px 5px 5px;">
                        <form style="display: flex;align-items: center;flex-direction: row-reverse;" action="{{route('estado') }}"  method="get" id="search">
                            <div class="">
                                <input type="submit" class="btn btn-dark btn-sm2" value="buscar">
                              </div>
                            <div class="">
                              <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                            </div>
                          </form>
                          <span style="font-size: 20px;">
                            {{ __('Reasignar Simcard') }}
                        </span>
                    </div>
                    <form method="POST" action="{{ route('estadobodega') }}">
                        {{ csrf_field() }}
                        <div style="display: flex;justify-content: space-between;align-items: center;flex-direction: row-reverse;padding: 5px 5px 1px;">
                            <div class="float-right">
                                <input type="submit" class="btn btn-primary waves-effect" value="Reasignar Simcard">
                            </div>
                        </div>
                        @if ($errors->has ('activado'))
                                    <div class="alert alert-success">
                                    <span class="error text-primary" for="input-name">{{ $errors->first('activado') }}</span>
                                    </div>
                                    @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" style="width: 100% !important">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Linea</th>
                                    <th>Usuario Asignado</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $simcards as $simcard )
                                <tr>
                                    <td>
                                        <input type="checkbox" value="{{ $simcard->id }}" id="{{ $simcard->id }}" name="activado[]">
                                        {{ $simcard->id }}
                                    </td>
                                    <td>{{ $simcard->linea }}</td>
                                    <td>{{ $simcard->name }}</td>
                                    <td>{{ $simcard->estado }}</td>
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
