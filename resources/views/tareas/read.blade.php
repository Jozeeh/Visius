@extends('layouts.app')
@section('content')
    
<div class="container">
    {{--José--}}
    <center>
        <img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="20%" class="img-fluid">
        <h1>Tareas a Asignar</h1>
        <p>En este apartado puedes asignarle las tareas a realizar a un empleado</p>
        <hr>
    </center>

    <table class="table text-center">
        <thead class="table-dark">
            <tr>
                <td>Nombre de tarea</td>
                <td>Descipción</td>
                <td>Estado</td>
                <td>Asignar</td>
            </tr>
        </thead>
        <tbody class="table-secondary">
            @foreach ($tareas as $item)
                @if ($item->tarEstado == 'Creada')
                <tr>
                    <td><b>{{$item->tarNombre}}</b></td>
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