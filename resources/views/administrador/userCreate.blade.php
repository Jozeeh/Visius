<!--Herencia del archivo de app.blade.php-->
@extends('layouts.app')

<!--Definiendo titulos-->
@section('title', 'Nuevo usuario')

<!--Definiendo contenido de la pagina-->
@section('content')
    <div class="container">
        <br>
        <h1>Ingrese los datos del nuevo usuario:</h1>
        <hr>
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    Nombre
                    <input type="text" name="empNombre" class="form-control" id="">
                    @error('empNombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Correo electronico:
                    <input type="text" name="empCorreo" class="form-control" id="">
                    @error('empCorreo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Contraseña provicional:
                    <input type="text" name="empPass" class="form-control" id="">
                    @error('empPass')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    Rol del usuario:
                    <select class="form-control"name="rol" id="">
                        <option value="1">Administrador</option>
                        <option value="2">Supervisor</option>
                        <option value="3">Empleado</option>
                    </select>
                </div>
            </div>
            <div class="col-12 mt-2">
                <button class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
@endsection