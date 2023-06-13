<!--Herencia del archivo de app.blade.php-->
@extends('layouts.app')

<!--Definiendo titulos-->
@section('title', 'Gestion de usuarios')

<!--Deatatable-->
@section('CSS')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

<!--Definiendo contenido de la pagina-->
@section('content')
    <div class="container text-center">
        <br>
        <h1><b>Usuarios registrados</b></h1>
        <hr>
        {{--Boton para ir a formulario de agregar empleados--}}
        <a class="btn btn-success text-white" href="/register">Registrar nuevo usuario</a>
        <table class="table table-hover table-bordered mt-2" id="">
            <thead>
            <tr>
                <td>Codigo</td>
                <td>Nombre</td>
                <td>Correo electronico</td>
                
                <td>Rol de usuario</td>
                <td>eventos</td>
            </tr>
        </thead>
        <tbody>
            {{-- Usuarios registrados --}}
            @foreach ($usuarios as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    
                    <td>{{$item->rolNombre}}</td>
                    <td>
                        <a href="/usuarios/edit/{{$item->id}}" class="btn btn-success btn-sm">Modificar</a>
                        <button class="btn btn-danger btn-sm" url="/usuarios/destroy/{{$item->id}}" onclick="destroy(this)" token="{{csrf_token()}}">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/userShow.js')}}"></script>
    {{-- SweetAlert--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    {{-- js 
    <script src="{{asset('js/_____.js')}}"></script>--}}
    Datatable
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

@endsection