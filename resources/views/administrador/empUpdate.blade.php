@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <center>
        <img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="20%" class="img-fluid mt-4">
        <h1><b>Asignación de área</b></h1>
        <p class="w-50 mt-4">Sección para la asignación del área del empleado.</p>
        <hr class="w-75">

        <form action="/update/asignar-area/{{$selEmpleado->empCodigo}}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-6 mt-4">
                <b>Nombre:</b>
                <select name="" class="form-control text-center" disabled>
                    @foreach ($users as $item)
                        @if ($selEmpleado->empUser === $item->id)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-6 mt-4">
                <b>Correo:</b>
                <select name="" class="form-control text-center" disabled>
                    @foreach ($users as $item)
                        @if ($selEmpleado->empUser === $item->id)
                            <option value="{{$item->id}}">{{$item->email}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-6 mt-4">
                <b>Area:</b>
                <select name="empArea" class="form-control text-center">
                    @foreach ($areas as $item)
                        <option value="{{$item->arCodigo}}">{{$item->arNombre}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-warning text-dark">Asignar área</button>

        </form>
        </center>
    </div>

@endsection