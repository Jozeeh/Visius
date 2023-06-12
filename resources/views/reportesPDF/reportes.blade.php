@extends('layouts.app')


@section('content')
    
    <style>
        .button-container {
        display: flex;
        justify-content: center;
        }
    </style>

    <center>
        <img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="20%" class="img-fluid mt-4">
        <h2 class="text-center">Reportes</h2>
        <p>En este apartado puedes generar reportes PDF según lo que necesites.</p>
        <hr>
    </center>

    {{--Botón desplegable para reportes PDF--}}
    <div class="container">
        {{--Botones reportes PDF--}}
        <div class="row">
            {{--Botón para ir a sección y generar reportes pdf de LOS EMPLEADOS--}}
            <div class="col-lg-6 mt-4">
                <div class="card h-100">
                    <div class="row">
                      <div class="col d-flex align-items-center justify-content-center">
                        <img src="{{ asset('/css/img/empleados.png')}}" class="card-img img-fuid" style="width: 60%;">
                      </div>
                      <div class="col">
                        <div class="card-body">
                          <h5 class="card-title">¿Necesitas reporte de los empleados?</h5>
                          <p class="card-text">Click en el botón ir a la sección y generar un reporte.</p>
                          <a href="/reportes-empleados" class="btn btn-sm btn-success text-white">Reportes Empleados</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            {{--Botón para ir a sección y generar reportes pdf de LOS SUPERVISORES--}}
            <div class="col-lg-6 mt-4">
                <div class="card h-100">
                    <div class="row">
                      <div class="col d-flex align-items-center justify-content-center">
                        <img src="{{ asset('/css/img/supervisores.png')}}" class="card-img img-fuid" style="width: 60%;">
                      </div>
                      <div class="col">
                        <div class="card-body">
                          <h5 class="card-title">¿Necesitas reporte de los supervisores?</h5>
                          <p class="card-text">Click en el botón ir a la sección y generar un reporte.</p>
                          <a href="/reportesPDF/reportesSupervisores" class="btn btn-sm btn-success text-white">Reportes Supervisores</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>   
        </div>

        <div class="row">
            {{--Botón para ir a sección y generar reportes pdf de LOS ADMINISTRADORES--}} 
            <div class="col-lg-6 mt-4">
                <div class="card h-100">
                    <div class="row">
                      <div class="col d-flex align-items-center justify-content-center">
                        <img src="{{ asset('/css/img/administradores.png')}}" class="card-img img-fuid" style="width: 60%;">
                      </div>
                      <div class="col">
                        <div class="card-body">
                          <h5 class="card-title">¿Necesitas reporte de los administradores?</h5>
                          <p class="card-text">Click en el botón ir a la sección y generar un reporte.</p>
                          <a href="/reportesPDF/reportesAdministradores" class="btn btn-sm btn-success text-white">Reportes Administradores</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            {{--Botón para ir a sección y generar reportes pdf de LAS TAREAS--}}
            <div class="col-lg-6 mt-4">
                <div class="card h-100">
                    <div class="row">
                    <div class="col d-flex align-items-center justify-content-center">
                        <img src="{{ asset('/css/img/tareas.png')}}" class="card-img img-fuid" style="width: 50%;">
                    </div>
                    <div class="col">
                        <div class="card-body">
                        <h5 class="card-title">¿Necesitas reporte de las tareas?</h5>
                        <p class="card-text">Click en el botón ir a la sección y generar un reporte.</p>
                        <a href="/reportesPDF/reportesTareas" class="btn btn-sm btn-success text-white">Reportes de Tareas</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


@endsection
