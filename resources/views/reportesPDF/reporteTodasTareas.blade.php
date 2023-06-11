<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas</title>

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

    <h2>Listado de Tareas</h2>
    <hr> <br>
    {{-- Nombre: {{$nombre}} --}}

    <table>
        <thead>
            <tr>
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
                    <td>{{$item['tarCodigo']}}</td>
                    <td>{{$item['tarNombre']}}</td>
                    <td>{{$item['tarFechaAsignada']}}</td>
                    <td>{{$item['tarFechaFinalizada']}}</td>
                    <td>{{$item['tarEmpleado']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>