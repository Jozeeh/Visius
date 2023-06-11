@extends('layouts.app')

@section('content')
    <h2 class="text-center">Gestión de Supervisores</h2>
    <hr>



    {{--Botón desplegable para reportes PDF--}}
    <div class="dropdown mt-4">


        {{--Boton reporte PDF--}}
        <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Reporte PDF Supervisores
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="/reporte-supervisores">Mostrar | Todos los supervisores</a></li>
          <li><a class="dropdown-item" href="/reporte-supervisoresDescargar">Descargar | Todos los supervisores</a></li>
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
                    </tr>
                </thead>

                <tbody>
                    @foreach ($supervisores as $item)
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

