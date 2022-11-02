@extends('layouts.app')

@section('template_title')
    Crear Simcards Asignada
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Simcards Asignada</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('simcards-asignadas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @if (@Auth::user()->hasRole('admin'))
                            @include('simcards-asignada.formadmin')
                            @else
                            @include('simcards-asignada.form')
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
