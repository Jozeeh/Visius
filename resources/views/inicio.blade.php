@extends('layouts.app')

@section('css')
    
@endsection

@section('content')
    <div class="container">
        <center>
            <img src="{{ asset('/css/img/logo_transparent.png') }}" alt="Logo" width="40%" class="img-fluid">
        </center>
        <h1>Bienvenido {{ Auth::user()->name }}</h1>
        <hr>
        <div class="row">
            <div class="col-12">
                <h4><b>¿Quiénes somos?</b></h4>
                <h5 align="justify">
                    Somos una empresa líder en el desarrollo de software, dedicada a proporcionar soluciones tecnológicas innovadoras y 
                    de calidad. Con una trayectoria sólida y experiencia en la industria, nos enorgullece ofrecer el mejor servicio a 
                    nuestros clientes. Contamos con un equipo altamente capacitado y comprometido con la excelencia y la satisfacción del 
                    cliente. En Visius, buscamos superar constantemente los límites tecnológicos y brindar excelentes soluciones a los problemas de nuestros clientes.
                </h5>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <h4><b>Misión</b></h4>
                <h5 align="justify">
                    Impulsar la transformación digital y el crecimiento de nuestros clientes a través del desarrollo de software de calidad, mientras ofrecemos productos 
                    y servicios confiables, escalables y que satisfagan y superen las expectativas. Nuestro objetivo es establecer relaciones duraderas con nuestros clientes, 
                    basadas en la confianza mutua y el éxito compartido.
                </h5>
            </div>
            <div class="col-6">
                <h4><b>Visión</b></h4>
                <h5 align="justify">
                    Ser reconocidos como líderes en la industria del desarrollo de software, impulsando la innovación y buscando constantemente la mejora, adaptándonos a los 
                    cambios tecnológicos y a las necesidades cambiantes del mercado. Aspiramos a dejar una huella significativa en la industria del desarrollo de software, 
                    ayudando a nuestros clientes a prosperar en la era digital.
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card bg-light mb-3" style="max-width: 39rem;">
                    <div class="card-body">
                      <img class="card-img-top" src="/css/img/bulbo.png" style="width: 40%" alt="Card image cap">
                      <h5 class="card-title">Misión</h5>
                      <hr>
                      <p class="card-text">
                        Impulsar la transformación digital y el crecimiento de nuestros clientes a través del desarrollo de software de calidad, mientras ofrecemos productos 
                        y servicios confiables, escalables y que satisfagan y superen las expectativas. Nuestro objetivo es establecer relaciones duraderas con nuestros clientes, 
                        basadas en la confianza mutua y el éxito compartido.
                      </p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <hr>
@endsection