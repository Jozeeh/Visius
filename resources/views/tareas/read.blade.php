@extends('layouts.app')
@section('content')
    
    <h1>Asignacion de tareas</h1>

    <table class="table table-dark">
        <thead>
            <tr >
                <td>Nombre de tarea</td>
                <td>Descipción</td>
                <td>Area</td>
                <td>Estado</td>
                <td>Asignar</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $item)
                @if ($item->tarEstado == 'creada')
                <tr class="table-active">
                    <td>{{$item->tarNombre}}</td>
                    <td>{{$item->tarDescripcion}}</td>
                    <td>{{$item->tarArea}}</td>
                    <td>{{$item->tarEstado}}</td>
                    <td>
                        <a href="/products/edit/{{$item->tarCodigo}}" class="btn btn-success btn-sm">Asignar</a>
                    </td>
                </tr>
                @endif
            @endforeach
           
        </tbody>
    </table>
    

@endsection