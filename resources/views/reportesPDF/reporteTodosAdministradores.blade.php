<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administradores</title>

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

    <h2>Listado de administradores</h2>
    <hr> <br>

    <table>
        <thead>
            <tr>
                <td>Codigo</td>
                <td>Nombre</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($administradores as $item)
                <tr>
                    <td>{{$item['supCodigo']}}</td>
                    <td>{{$item['supUser']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>