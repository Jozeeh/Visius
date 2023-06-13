@extends('app')

<!--Definiendo titulos-->
@section('title', 'Registro usuario')

@section('content')
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Resgitro de usuarios</h1>
        <br>
        <form class="form-control" action="">
            <div class="row">
                <div class="col-6">
                    Nombre de usuario:
                    <input type="text" name="userNombre">
                </div>
                <div class="col-6">
                    Correo electronico:
                    <input type="text" name="userCorreo">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    Constraseña de usuario:
                    <input type="password" name="userPass">
                </div>
            </div>
            <select name="rol" id="">
                <option value="1">Administrador</option>
                <option value="2">Supervisor</option>
                <option value="3">Empleado</option>
            </select>
        </form>
    </div>
</body>
</html>
@endsection
