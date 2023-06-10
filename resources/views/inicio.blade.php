@extends('layouts.app')

@section('css')
    
@endsection

@section('content')

    <img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="40%" class="img-fluid">

    <h1>Bienvenido {{ Auth::user()->name }}</h1>



@endsection