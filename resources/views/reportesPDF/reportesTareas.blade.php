@extends('layouts.app')


@section('content')
    <h2 class="text-center">Reportes</h2>
    <hr>

    {{--Botón desplegable para reportes PDF--}}
    <div class="dropdown">
        {{--Boton reporte PDF--}}
        <button class="btn btn-sm btn-success dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Reporte PDF Tareas
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item text-white" href="/reporte-tareas">Mostrar | Todos los tareas</a></li>
          <li><a class="dropdown-item text-white" href="/reporte-tareasDescargar">Descargar | Todos los tareas</a></li>
        </ul>
    </div>




    <div class="card mt-4">
        <div class="card-body table-responsive">
            <table class="table text-center table-bordered overflow-x-auto w-100 mt-4" id="">
                <thead>
                    <tr class="table-dark">
                        <td>Código</td>
                        <td>Nombre tarea</td>
                        <td>Fecha asignada</td>
                        <td>Fecha finalizada</td>
                        <td>Empleado</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tareas as $item)
                        <tr>
                            <td>{{$item->tarCodigo}}</td>
                            <td>{{$item->tarNombre}}</td>
                            <td>{{$item->tarFechaAsignada}}</td>
                            <td>{{$item->tarFechaFinalizada}}</td>
                            <td>{{$item->tarEmpleado}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

