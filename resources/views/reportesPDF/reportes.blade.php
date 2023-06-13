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


<div class="container">
  <div class="row">
    {{--Reporte de todos los empleados--}}
    <div class="col-lg-6 mt-4">
      <div class="card h-100">
        <div class="row">
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{ asset('/css/img/empleados.png')}}" class="card-img img-fuid" style="width: 60%;">
          </div>
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">Generar reporte TODOS los empleados</h5>
              <p class="card-text">Click en el botón para mostrar o descargar el reporte.</p>
              <div class="dropdown mt-4">
                {{--Boton reporte PDF--}}
                <button class="btn btn btn-success dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Reporte PDF empleados
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item text-white" href="/reporte-empleadosTodos">Mostrar | Todos los empleados</a></li>
                  <li><a class="dropdown-item text-white" href="/reporte-empleadosDescargar">Descargar | Todos los empleados</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{--Reporte areas--}}
    <div class="col-lg-6 mt-4">
      <div class="card h-100">
        <div class="row">
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{ asset('/css/img/empleados.png')}}" class="card-img img-fuid" style="width: 60%;">
          </div>
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">Generar reporte TODOS los empleados</h5>
              <p class="card-text">Click en el botón para mostrar o descargar el reporte.</p>
              <div class="dropdown mt-4">
                {{--Boton reporte PDF--}}
                <form action="/reporte-empleadosArea" method="post">
                  @csrf
                  <select name="selectEmpleadosArea" class="form-select">
                    @foreach ($areas as $item)
                      <option value="{{$item->arCodigo}}">{{$item->arNombre}}</option>
                    @endforeach
                  </select>
                  <button class="btn btn-success text-white" type="submit">Generar Reporte</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    {{--Reporte tarea asignada por empleados--}}
    <div class="col-lg-6 mt-4">
      <div class="card h-100">
        <div class="row">
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{ asset('/css/img/empleados.png')}}" class="card-img img-fuid" style="width: 60%;">
          </div>
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">Generar reporte TODOS los empleados</h5>
              <p class="card-text">Click en el botón para mostrar o descargar el reporte.</p>
              <div class="dropdown mt-4">
                {{--Boton reporte PDF--}}
                <form action="/reporte-tareasEmpleados" method="post">
                  @csrf
                  <select name="selectTareasEmpleados" class="form-select">
                    @foreach ($tareasPorEmpleados as $item)
                      <option value="{{$item->empCodigo}}">{{$item->empName}}</option>
                    @endforeach
                  </select>
                  <button class="btn btn-success text-white" type="submit">Generar Reporte</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
          


@endsection
