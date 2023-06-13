<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- icono de pestaña --}}
	<link rel="shortcut icon" href="{{ asset('/css/img/logo_transparent.png') }}" type="image/x-icon">

	<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- Scripts -->
	 @vite(['resources/sass/app.scss', 'resources/js/app.js'])
     
</head>
<body>

    

    <style>
        body{
            background-color: rgb(212,212,212);
        }
        
    </style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <center><img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="40%" class="img-fluid"></center>
                <div class="">
                <div class="card mt-2">
    
                    <div class="card-header text-white" style="background-color: rgb(41, 41, 49);">{{ __('Inicio de sesión') }}</div>
    
                    <div class="card-body" style="background-color: rgb(77, 77, 80);">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end mt-4">{{ __('Correo:') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end mt-4">{{ __('Contraseña:') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn text-white" style="background-color: rgb(32,183,128);">
                                        {{ __('Iniciar sesion') }}
                                    </button>
    
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== Scripts -->
	<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
        
	</div>
    
</body>
</html>
