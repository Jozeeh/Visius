@extends('layouts.app')
@section('content')
    
<div class="container">
    {{--José--}}
    <h1>Asignacion de tareas</h1>
    <p>Apartado para la asignación de tareas a empleados.</p>

    <table class="table text-center">
        <thead class="table-dark">
            <tr>
                <td>Nombre de tarea</td>
                <td>Descipción</td>
                <td>Area</td>
                <td>Estado</td>
                <td>Asignar</td>
            </tr>
        </thead>
        <tbody class="table-secondary">
            @foreach ($tareas as $item)
                @if ($item->tarEstado == 'Creada')
                <tr>
                    <td>{{$item->tarNombre}}</td>
                    <td>{{$item->tarDescripcion}}</td>
                    {{-- <td>{{$item->tarArea}}</td> --}}
                    <td>{{$item->tarEstado}}</td>
                    <td>
                        <a href="/products/edit/{{$item->tarCodigo}}" class="btn btn-success btn-sm text-white">Asignar</a>
                    </td>
                </tr>
                @endif
            @endforeach
        
        </tbody>
    </table>
</div>
    

@endsection