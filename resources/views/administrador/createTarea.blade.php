@extends('layouts.app')

@section('content')
    <center>
        <img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="250px" class="img-fluid mt-4"><br>
        <p class="w-50">Este es el apartado para la creacion de tareas ya sea que necesites administrar tus tareas diarias, de empleado o necesitas que le sea asignada por un supervisor.</p>

        <div class="container">
            <div class="row mt-4">
                <div class="col-12">

                    <form action="/tareas/store" method="post">
                        @csrf
                        <div class="col-6">
                                <b>Nombre de la tarea:</b>
                                
                                <input type="text" name="tarNombre" class="form-control text-center" id="">
                                @error('tarNombre')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                
                        </div>
                        <div class="col-6">
                            <b>Descripción de la tarea:</b>
                            <input type="text" name="tarDescripcion" class="form-control text-center" id="">
                            @error('tarDescripcion')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Desactivamos área --}}
                        {{-- <div class="col-6">
                            <b>Area:</b>
                            <select class="form-control text-center"name="tarArea" id="">
                                @foreach ($areas as $item)
                                <option value="{{$item->arCodigo}}">
                                    {{$item->arNombre}}
                                </option>
                                @endforeach
                                
                            </select>
                            
                            @error('tarArea')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div> --}}

                        <div>
                            <button class="btn btn-warning text-black">Crear Tarea</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center> 


@endsection