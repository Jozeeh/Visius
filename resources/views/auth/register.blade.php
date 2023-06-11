@extends('layouts.app')

<!--Definiendo titulos-->
@section('title', 'Registrar usuario')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-4 text-center">

        <center><img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="20%" class="img-fluid"></center>
        <h2>Registro de usuarios</h2>
        <p class="w-50">Apartado para poder añadir nuevos usuarios según se desee, tenga en cuenta que según el rol del usuario esté tendrá solo opciones especificas que se le han asignado.</p>
        <hr class="w-75">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end mt-4 text-dark">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end mt-4 text-dark">{{ __('Correo') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end mt-4 text-dark">{{ __('Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end mt-4 text-dark">{{ __('Confirmar contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-3">
                
                <label for="userRol" class="col-md-4 col-form-label text-md-end mt-4 text-dark">{{ __('Rol de usuario') }}</label>

                <div class="col-md-6">
                    <select id="userRol" class="form-control text-center @error('userRol') is-invalid @enderror" name="userRol" value="{{ old('userRol') }}" required>
                        @foreach ($roles as $item)
                            <option value="{{$item->rolCodigo}}">
                                {{$item->rolNombre}}
                            </option>
                        @endforeach
                    </select>
                    @error('userRol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-warning text-dark">
                        {{ __('Registrar usuario') }}
                    </button>
                </div>
            </div>
        </form>

        {{-- <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
