<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">

	{{-- css personalizados --}}
	@yield('css')

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- sweetalert --}}
	<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	

	{{-- icono de pestaña --}}
	<link rel="shortcut icon" href="{{ asset('/css/img/logo_transparent.png') }}" type="image/x-icon">

	<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

	

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<link rel="stylesheet" href="{{asset('css/main.css')}}">

	 <!-- Scripts -->
	 @vite(['resources/sass/app.scss', 'resources/js/app.js'])

	 <style>
		body{
			background-color: rgb(248,250,252);
		}
	 </style>
</head>
<body>
	<!-- SideBar -->
	<div id="app">
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				<img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="40%" class="img-fluid">
			</div>
			<!-- SideBar User info -->
			@guest
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					@if (Route::has('login'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
					@endif
				</li>
			</ul>
		@else
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="{{asset('/assets/img/avatar.png')}}" alt="UserIcon">
					<figcaption class="text-center text-titles">{{ Auth::user()->name }}</figcaption>
					<figcaption class="text-center text-titles">
						@if (Auth::user()->userRol == 1)
							Administrador
						@endif
						@if (Auth::user()->userRol == 2)
							Supervisor
						@endif
						@if (Auth::user()->userRol == 3)
							Empleado
						@endif
					</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					{{-- <li>
						<a href="#!">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li> --}}
					<li>
						<a class="dropdown-item zmdi zmdi-power" href="{{ route('logout') }}"
						   onclick="event.preventDefault();
										 document.getElementById('logout-form').submit();">
							{{ __('Cerrar sesión') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>		
					</li>
				</ul>
			</div>
			
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				{{-- <li>
					<a href="home.html">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Menu
					</a>
				</li> --}}
				{{-- Si el usuario inicio sesión como supervisor tendrá los siguientes elementos en la busqueda --}}
				{{-- 
				1 = Administrador
				2 = Supervisor
				3 = Empleados --}}

				{{-- Administador --}}

				{{-- inicio de ibenvenida --}}
				<li class="nav-item active">
					<a class="nav-link" href="/">Inicio</a>
				</li>


				@if (Auth::user()->userRol == 1)
					<li class="nav-item active">
						<a class="nav-link" href="/gestion-empleados">Gestión de empleados</a>
					</li>

					<li class="nav-item active">
						<a class="nav-link" href="/gestion-usuarios">Gestión de usuarios</a>
					</li>

					<li class="nav-item active">
						<a class="nav-link" href="/CreateTareas">Creación de tareas</a>
					</li>

					<li class="nav-item active">
						<a class="nav-link" href="/tareas/show">Estado de tareas</a>
					</li>

					<li class="nav-item active">
						<a class="nav-link" href="/reportes">Reportes</a>
					</li>
					<li>
						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Registrar usuarios') }}</a>
							</li>
						@endif
					</li>
					
				@endif
				{{-- Supervisor --}}
				@if (Auth::user()->userRol == 2)
					<li class="nav-item active">
						<a class="nav-link" href="/gestion-empleados">Gestión de empleados</a>
					</li>

					<li class="nav-item active">
						<a class="nav-link" href="/gestion-usuarios">Gestión de usuarios</a>
					</li>

					<li class="nav-item active">
						<a class="nav-link" href="/CreateTareas">Creación de tareas</a>
					</li>

					{{-- <li class="nav-item active">
						<a class="nav-link" href="/supervisor/asignar-tarea">Asignación de tareas</a>
					</li> --}}

					<li class="nav-item active">
						<a class="nav-link" href="/tareas/show">Estado de tareas</a>
					</li>

					<li>
						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Registrar usuarios') }}</a>
							</li>
						@endif
					</li>

					<li class="nav-item active">
						<a class="nav-link" href="/reportes">Reportes</a>
					</li>
				@endif
				{{-- Si no es administrador o supervisor será empleado --}}
				@if (Auth::user()->userRol == 3)
					<li class="nav-item active">
						<a class="nav-link" href="/tareas/show">Tareas asignadas</a>
					</li>
					
					<li class="nav-item active">
						<a class="nav-link" href="/reportesPDF/reportesTareas">Reporte de tareas</a>
					</li>

					<li class="nav-item active">
						<a class="nav-link" href="/">Estado de tareas</a>
					</li>
				@endif

				{{-- <li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administration <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="period.html"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Period</a>
						</li>
						<li>
							<a href="subject.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Subject</a>
						</li>
						<li>
							<a href="section.html"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Section</a>
						</li>
						<li>
							<a href="salon.html"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Salon</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Users <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li> 
							<a href="admin.html"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Admin</a>
						</li>
						<li>
							<a href="teacher.html"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Teacher</a>
						</li>
						<li>
							<a href="student.html"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Student</a>
						</li>
						<li>
							<a href="representative.html"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Representative</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-card zmdi-hc-fw"></i> Payments <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="registration.html"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Registration</a>
						</li>
						<li>
							<a href="payments.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Payments</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Settings School <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="school.html"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> School Data</a>
						</li>
					</ul>
				</li>
			</ul> --}}
			@endguest
		</div>

	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar" style="background-color: rgb(41,41,49);">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container">
			
		@yield('content')
			
		</div>

		{{-- FOOTER --}}
		<div class="container-fluid mt-5" style="background-color: rgb(41,41,49); position: sticky; bottom: 0;">
			<footer class="py-3 my-1">
				<ul class="nav justify-content-center border-bottom pb-3 mb-3">
				  <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Facebook</a></li>
				  <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Twitter</a></li>
				  <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Instagram</a></li>
				</ul>
				<p class="text-center text-white">© 2023 Visius Company, Inc</p>
			</footer>
		</div>
		
	</section>
	</section>

	<!-- Dialog help -->
	

	<!--====== Scripts -->
{{-- <script src="{{asset('/js/jquery-3.1.1.min.js')}}"></script> --}}
	{{-- <script src="{{asset('/js/sweetalert2.min.js')}}"></script> --}}
	{{-- <script src="{{asset('/js/bootstrap.min.js')}}"></script> --}}

	<script src="{{asset('/js/material.min.js')}}"></script>
	<script src="{{asset('/js/ripples.min.js')}}"></script>
	<script src="{{asset('/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('/js/main.js')}}"></script>
	
	<script>
		$.material.init();
	</script>
	</div>
	@yield('js')
</body>
</html>