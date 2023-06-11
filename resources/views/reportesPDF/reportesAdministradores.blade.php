@extends('layouts.app')

@section('content')
    <h2 class="text-center">Gestión de Administradores</h2>
    <hr>



    {{--Botón desplegable para reportes PDF--}}
    <div class="dropdown mt-4">


        {{--Boton reporte PDF--}}
        <button class="btn btn-sm btn-success dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Reporte PDF Administradores
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item text-white" href="/reporte-administradores">Mostrar | Todos los administradores</a></li>
          <li><a class="dropdown-item text-white" href="/reporte-administradoresDescargar">Descargar | Todos los administradores</a></li>
        </ul>
        <button class="btn btn-sm btn-success text-white" onclick="window.location.href = '/reports'">Reportes</button>
    </div>

    <div class="card mt-4">
        <div class="card-body table-responsive">
            <table class="table text-center table-bordered overflow-x-auto w-100 mt-4" id="">
                <thead>
                    <tr class="table-dark">
                        <td>Código</td>
                        <td>Usuario</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($administradores as $item)
                        <tr class="table-secondary">
                            <td>{{$item->supCodigo}}</td>
                            <td>{{$item->supUser}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

