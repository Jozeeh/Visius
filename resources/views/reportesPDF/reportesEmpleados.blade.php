@extends('layouts.app')


@section('content')
    <h2 class="text-center">Reportes</h2>
    <hr>

    {{--Botón desplegable para reportes PDF--}}
    <div class="dropdown">
        {{--Boton reporte PDF--}}
        <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Reporte PDF Empleados
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="/reporte-empleados">Mostrar | Todos los empleados</a></li>
          <li><a class="dropdown-item" href="/reporte-empleadosDescargar">Descargar | Todos los empleados</a></li>
        </ul>
        <button class="btn btn-sm btn-success" onclick="window.location.href = '/reports'">Reportes</button>

    </div>




    <div class="card mt-4">
        <div class="card-body table-responsive">
            <table class="table text-center table-bordered overflow-x-auto w-100 mt-4" id="">
                <thead>
                    <tr class="table-dark">
                        <td>Código</td>
                        <td>Usuario</td>
                        <td>Area</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($empleados as $item)
                        <tr>
                            <td>{{$item->empCodigo}}</td>
                            <td>{{$item->empUser}}</td>
                            <td>{{$item->empArea}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
