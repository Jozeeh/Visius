<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>

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

    <h2>Listado de Empleados</h2>
    <hr> <br>

    <table>
        <thead>
            <tr>
                <td>Codigo Tarea</td>
                <td>Empleado</td>
                <td>Tarea</td>
                <td>Descripción</td>
                <td>Estado</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareasEmpleados as $item)
                <tr>
                    <td>{{$item['tarCodigo']}}</td>
                    <td>{{$item['tarNombreEmpleado']}}</td>
                    <td>{{$item['tarNombre']}}</td>
                    <td>{{$item['tarDescripcion']}}</td>
                    <td>{{$item['tarEstado']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>