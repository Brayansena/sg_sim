@extends('layouts.app')

@section('template_title')
    Update Simcards Asignada
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Simcards Asignada</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('simcards-asignadas.update', $simcardsAsignada->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('simcards-asignada.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
