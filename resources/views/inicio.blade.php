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
        <div class="row" align="center">
            <div class="col-12">
                <div class="card bg-light mb-3" style="max-width: 38rem;">
                    <div class="card-body">
                      <center><img class="card-img-top" src="/css/img/mostrar-codigo.png" style="width: 20%" alt="Card image cap"></center>
                      <hr>
                      <center><h5 class="card-title"><b>¿Quíenes Somos?</b></h5></center>
                      <hr>
                      <p class="card-text" align="justify">
                        Somos una empresa líder en el desarrollo de software, dedicada a proporcionar soluciones tecnológicas innovadoras y                 de calidad. Con una trayectoria sólida y experiencia en la industria, nos enorgullece ofrecer el mejor servicio a 
                        nuestros clientes. Contamos con un equipo altamente capacitado y comprometido con la excelencia y la satisfacción del 
                        cliente. En Visius, buscamos superar constantemente los límites tecnológicos y brindar excelentes soluciones a los problemas de nuestros clientes.
                      </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card bg-light mb-3" style="max-width: 38rem;">
                    <div class="card-body">
                      <center><img class="card-img-top" src="/css/img/bandera.png" style="width: 20%" alt="Card image cap"></center>
                      <hr>
                      <center><h5 class="card-title"><b>Misión</b></h5></center>
                      <hr>
                      <p class="card-text" align="justify">
                        Impulsar la transformación digital y el crecimiento de nuestros clientes a través del desarrollo de software de calidad, mientras ofrecemos productos 
                        y servicios confiables, escalables y que satisfagan y superen las expectativas. Nuestro objetivo es establecer relaciones duraderas con nuestros clientes, 
                        basadas en la confianza mutua y el éxito compartido.
                      </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card bg-light mb-3" style="max-width: 38rem;">
                    <div class="card-body">
                      <center><img class="card-img-top" src="/css/img/vision-baja.png" style="width: 20%" alt="Card image cap"></center>
                      <hr>
                      <center><h5 class="card-title"><b>Visión</b></h5></center>
                      <hr>
                      <p class="card-text" align="justify">
                        Ser reconocidos como líderes en la industria del desarrollo de software, impulsando la innovación y buscando constantemente la mejora, adaptándonos a los 
                        cambios tecnológicos y a las necesidades del mercado. Aspirando a dejar una huella significativa en la industria, ayudando a nuestros clientes a prosperar 
                        en la era digital.
                      </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection