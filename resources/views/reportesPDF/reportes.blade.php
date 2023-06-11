@extends('layouts.app')


@section('content')
    <h2 class="text-center">Reportes</h2>
    <hr>
    <style>
        .button-container {
        display: flex;
        justify-content: center;
        }
    </style>
    {{--Botón desplegable para reportes PDF--}}
    <div class="button-container">
        {{--Botones reportes PDF--}}
        <button class="btn btn-sm btn-success" onclick="window.location.href = '/reportesPDF/reportesEmpleados'">Reportes Empleados</button>
        <button class="btn btn-sm btn-success" onclick="window.location.href = '/reportesPDF/reportesSupervisores'">Reportes Supervisores</button>
        <button class="btn btn-sm btn-success" onclick="window.location.href = '/reportesPDF/reportesAdministradores'">Reportes Administradores</button>
        <button class="btn btn-sm btn-success" onclick="window.location.href = '/reportesPDF/reportesTareas'">Reportes Tareas</button>
    </div>


@endsection
