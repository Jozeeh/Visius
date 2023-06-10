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
    <div class="container">
        <br>
        <h1><b>Empleados registrados</b></h1>
        <hr>
        {{-- Tabla para mostrar empleados registrados --}}
        <table class="table table-hover table-bordered mt-2" id="">
            <thead>
            <tr>
                <td>Codigo</td>
                <td>Nombre</td>
                <td>Correo electronico</td>
                <td>Área asignada</td>
                <td>Supervisor asignado</td>
            </tr>
        </thead>
        <tbody>
            {{-- Empleados registrados --}}
            {{-- @foreach ($collection as $item)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach --}}
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