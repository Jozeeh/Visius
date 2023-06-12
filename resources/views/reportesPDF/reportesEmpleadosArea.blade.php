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
    {{-- Nombre: {{$nombre}} --}}

    <table>
        <thead>
            <tr>
                <td>Codigo</td>
                <td>Empleado</td>
                <td>Correo</td>
                <td>Area</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleadosArea as $item)
                <tr>
                    <td>{{$item['empCodigo']}}</td>
                    <td>{{$item['empName']}}</td>
                    <td>{{$item['empEmail']}}</td>
                    <td>{{$item['empNombreArea']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>