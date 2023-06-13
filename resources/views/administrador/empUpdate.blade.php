@extends('layouts.app')

<!--Definiendo titulos-->
@section('title', 'Modificar usuario')
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

            <div class="col-6 mt-4">
                <b>Asignar supervisor:</b>
                <select name="empSupervisor" class="form-control text-center">
                    @if (Auth::user()->userRol == 1)
                        @foreach ($supervisores as $item)
                            <option value="{{$item->supCodigo}}">{{$item->name}}</option>
                        @endforeach
                    @else
                        @foreach ($supervisores as $item)
                            
                            @if (Auth::user()->name == $item->name)
                                <option value="{{$item->supCodigo}}">{{$item->name}}</option>
                            @endif
                            
                        @endforeach
                    @endif

                   
                </select>
            </div>

            <button class="btn btn-warning text-dark">Asignar área y Supervisor</button>

        </form>
        </center>
    </div>

@endsection