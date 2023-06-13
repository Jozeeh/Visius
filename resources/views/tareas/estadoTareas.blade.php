@extends('layouts.app')
@section('content')
    
	
<div class="container">
    
    <center>
        <img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="20%" class="img-fluid mt-4">
        <h1 class="mt-4">Tareas a Asignar</h1>
        <p>En este apartado puedes asignarle las tareas a realizar a un empleado</p>
        <hr>
    </center>

    <table class="table text-center">
        <thead class="table-dark">
            <tr>
                <td>Nombre de tarea</td>
                <td>Descipción</td>
                <td>Estado</td>
                <td>Empleado</td>
            </tr>
        </thead>
        <tbody class="table-secondary">

            @if (Auth::user()->userRol == 3)

            @foreach ($tareas as $item)
                @if ($item->tarEmpleado == Auth::user()->name)
                    @if ($item->tarEstado == 'Revision' || $item->tarEstado == 'Finalizada')
                        <tr>
                            <td><b>{{$item->tarNombre}}</b></td>
                            <td>{{$item->tarDescripcion}}</td>
                            {{-- <td>{{$item->tarArea}}</td> --}}
                            <td>{{$item->tarEstado}}</td>
                            <td>{{$item->tarEmpleado}}</td>
            
                            
                            
                        </tr>
                        {{-- @if ($item->tarEstado == 'Creada')
                        
                        @endif --}}

                    @endif
                
                @endif
            @endforeach
                    
                
                
            @else
                
            @foreach ($tareas as $item)
                @if($item->tarEstado == 'Finalizada')
                    <tr>
                        <td><b>{{$item->tarNombre}}</b></td>
                        <td>{{$item->tarDescripcion}}</td>
                        {{-- <td>{{$item->tarArea}}</td> --}}
                        <td>{{$item->tarEstado}}</td>
                        <td>{{$item->tarEmpleado}}</td>
                        
                    </tr>
                    {{-- {{-- @if ($item->tarEstado == 'Creada') --}}
                    
                @endif
            @endforeach

            @endif

            
        
        </tbody>
    </table>
</div>
    

@endsection

@section('js')
    <script src="{{asset('js/alertasTareas.js')}}"></script>
   
@endsection

