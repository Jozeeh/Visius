@extends('layouts.app')

@section('content')
    <div class="container">

        <center>
        <img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="20%" class="img-fluid mt-4">
        <h1><b>Asignación de área</b></h1>
        <p class="w-50 mt-4">Sección para la asignación del área del empleado.</p>
        <hr class="w-75">

        <form action="/update/asignar-tarea/{{$selTarea->tarCodigo}}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-6 mt-4">
                <b>Nombre tarea:</b>
                    <select name="" class="form-control text-center" disabled>
                        <option value="{{$selTarea->tarCodigo}}">{{$selTarea->tarNombre}}</option>
                    </select>
            </div>

            <div class="col-6 mt-4">
                <b>Descripción de la tarea:</b>
                <select name="" class="form-control text-center" disabled>
                    <option value="{{$selTarea->tarCodigo}}">{{$selTarea->tarDescripcion}}</option>
                </select>
            </div>

            <div class="col-6 mt-4">
                <b>Estado de la tarea:</b>
                <p>Al asignar una tarea cambiará su estado.</p>
                <select name="" class="form-control text-center" disabled>
                    <option value="{{$selTarea->tarCodigo}}">{{$selTarea->tarEstado}}</option>
                </select>
                {{-- <input type="text" class="form-control text-center" value="{{$selTarea->tarEstado}}" disabled> --}}
            </div>

            <div class="col-6 mt-4">
                <b>Empleado para asignar:</b>
                <select name="tarEmpleado" class="form-control text-center">
                    @foreach ($empleados as $empleado)
                        @foreach ($users as $user)
                            @if ($empleado->empUser === $user->id)
                                <option value="{{$empleado->empCodigo}}">{{$user->name}}</option>
                            @endif
                        @endforeach
                    @endforeach
                    {{-- @foreach ($empleados->take(1) as $item)
                        @foreach ($users as $item2)
                            <option value="{{$item->empCodigo}}">{{$item2->name}}</option>
                        @endforeach
                    @endforeach --}}
                </select>
            </div>

            <button class="btn btn-warning text-dark">Asignar empleado</button>
            <a href="/tareas/show" class="btn btn-danger text-white">Cancelar</a>

        </form>
        </center>
    </div>
@endsection