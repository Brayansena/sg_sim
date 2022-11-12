@extends('layouts.app')

@section('template_title')
    Crear Dispositivo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Selecionar Tipo Dispositivo</span>
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="post">
                            Estado actual:
                            <select id="status" name="status" onChange="mostrar(this.value);">
                                <option value="estudiante">Estudiante</option>
                                <option value="trabajador">Trabajador</option>
                                <option value="autonomo">Autónomo</option>
                                <option value="paro">En el paro</option>
                             </select>
                        </form>
                        <div id="estudiante" style="display: none;">
                            <h2>Si eres estudiante...</h2>
                            <form method="POST" action="{{ route('dispositivos.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                @include('dispositivo.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
    function mostrar(id) {
        if (id == "estudiante") {
            $("#estudiante").show();
            $("#trabajador").hide();
            $("#autonomo").hide();
            $("#paro").hide();
        }

        if (id == "trabajador") {
            $("#estudiante").hide();
            $("#trabajador").show();
            $("#autonomo").hide();
            $("#paro").hide();
        }

        if (id == "autonomo") {
            $("#estudiante").hide();
            $("#trabajador").hide();
            $("#autonomo").show();
            $("#paro").hide();
        }

        if (id == "paro") {
            $("#estudiante").hide();
            $("#trabajador").hide();
            $("#autonomo").hide();
            $("#paro").show();
        }
    }
    </script>
@endsection
