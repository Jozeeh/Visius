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
            {{--Botón para generar reporte de TODOS LOS EMPLEADOS--}}
            <div class="col-6">
                <div class="card">
                    <div class="row no-gutters">
                      <div class="col">
                        <img src="{{ asset('/css/img/empleados.png')}}" class="card-img img-fuid mx-auto d-block" style="width: 40%;">
                      </div>
                      <div class="col">
                        <div class="card-body">
                          <h5 class="card-title">Título de la tarjeta</h5>
                          <p class="card-text">Texto de la tarjeta.</p>
                          <a href="'/reportesPDF/reportesEmpleados" class="btn btn-sm btn-success text-white">Reporte Empleados</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="row no-gutters">
                      <div class="col">
                        <img src="{{ asset('/css/img/empleados.png')}}" class="card-img img-fuid" style="width: 40%;">
                      </div>
                      <div class="col">
                        <div class="card-body">
                          <h5 class="card-title">Título de la tarjeta</h5>
                          <p class="card-text">Texto de la tarjeta.</p>
                          <a href="'/reportesPDF/reportesEmpleados" class="btn btn-sm btn-success text-white">Reporte Empleados</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Título de la tarjeta</h5>
              <p class="card-text">Texto de la tarjeta.</p>
              <a href="'/reportesPDF/reportesEmpleados" class="btn btn-sm btn-success text-white">Reporte Empleados</a>
            </div>
        </div>

        <button class="btn btn-sm btn-success text-white" onclick="window.location.href = '/reportesPDF/reportesEmpleados'">Reportes Empleados</button>
        <button class="btn btn-sm btn-success text-white" onclick="window.location.href = '/reportesPDF/reportesSupervisores'">Reportes Supervisores</button>
        <button class="btn btn-sm btn-success text-white" onclick="window.location.href = '/reportesPDF/reportesAdministradores'">Reportes Administradores</button>
        <button class="btn btn-sm btn-success text-white" onclick="window.location.href = '/reportesPDF/reportesTareas'">Reportes Tareas</button>
    </div>


@endsection
