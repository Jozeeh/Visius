<!--Herencia del archivo de app.blade.php-->
@extends('layouts.app')

<!--Definiendo titulos-->
@section('title', 'Gestion de usuarios')

<!--Deatatable-->
@section('CSS')
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

<!--Definiendo contenido de la pagina-->
@section('content')
    <div class="container text-center">
        <img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="20%" class="img-fluid mt-4">
        <h1><b>Empleados registrados</b></h1>
        <hr>
        {{-- Tabla para mostrar empleados registrados --}}
        <table class="table text-center table-hover table-bordered mt-2" id="">
            <thead class="table-dark">
            <tr>
                <td>Codigo Empleado</td>
                <td>Nombre</td>
                <td>Correo electronico</td>
                <td>Área asignada</td>
                <td>Código Usuario</td>
                {{-- <td>Supervisor asignado</td> --}}
                <td>Gestionar</td>
            </tr>
        </thead>
        <tbody class="table-secondary">
            {{-- Empleados registrados --}}
            @foreach ($empleados as $item)
                <tr>
                    <td>{{$item->empCodigo}}</td>
                    <td>{{$item->empName}}</td>
                    <td>{{$item->empEmail}}</td>
                    <td>{{$item->empArea}}</td>
                    <td>{{$item->empUser}}</td>
                    {{-- <td>{{$item->empSupervisor}}</td> --}}
                    <td>
                        <a href="/edit/asignar-area/{{$item->empCodigo}}" class="btn btn-success btn-sm text-white">Asignar area</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    {{-- SweetAlert--}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet"> --}}
    {{-- js 
    <script src="{{asset('js/_____.js')}}"></script>--}}
    Datatable
    
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script>
        $(document).ready(function () {
            $('#_______').DataTable();
            });
    </script> --}}
@endsection