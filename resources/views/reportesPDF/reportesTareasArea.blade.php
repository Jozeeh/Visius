<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de tareas por área de trabajo</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        table{
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            table-layout: fixed;
            text-align: center;
        }
        td{
            border-bottom: 1px solid;
        }
        thead{
            background-color: rgb(67, 67, 67);
            color: white;
        }
        
    </style>

</head>
<body>
    <div class="row">
        <div class="col-6">
            <img src="css/img/logo_transparent.png" width="40%" align="left">
        </div>
        <div class="col-6" align="right">
            <h4>
                <b>Visius, El Salvador</b><br>
                <b>Todos los derechos reservados</b> 
            </h4>
        </div>
    </div>
    <br>
    <hr>
    <h2>Tareas de Empleados</h2>
    <hr> <br>
    {{-- Nombre: {{$nombre}} --}}
    <h3>Reporte por área de trabajo</h3>
    <p align="justify">
        Que tenga un muy buen día, por medio del presente documento se reporta las tareas asginadas a los empleados registrados 
        en nuestra empresa, los cuales forman parte de su área de trabajo especificada en la tabla de datos. Esperamos 
        que esta información pueda ser de su ayuda. Si tiene alguna inquietud no dude en contactarse con nuestro servicio 
        al cliente, será un gusto atenderle.
    </p>
    <p align="left">
        <b>Teléfono de contacto: </b>2256-9854 <br>
        <b>Correo electrónico: </b>dswvisiusSV@gmail.com
    </p>
    <table>
        <thead>
            <tr>
                <td>Codigo tarea</td>
                <td>Tarea</td>
                <td>Descripción</td>
                <td>Estado</td>
                <td>Area</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareasArea as $item)
                <tr>
                    <td>{{$item['tarCodigo']}}</td>
                    <td>{{$item['tarNombre']}}</td>
                    <td>{{$item['tarDescripcion']}}</td>
                    <td>{{$item['tarEstado']}}</td>
                    <td>{{$item['arNombre']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>