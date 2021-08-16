@extends('layouts.main')
@section('titulo', 'Bienvenido')
@section('contenido')
    @guest
        @include('layouts.nav-log')

        {{-- incluye vista inicio --}}
    <div class="bg-fondo">

   
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="1000">
                    <img src="https://wallpapercave.com/wp/wp3766140.jpg"
                        class="img-fluid d-block w-100" alt="">
                </div>


                <div class="carousel-item" data-bs-interval="1000">
                    <img src="https://wallpapercave.com/wp/wp3766139.jpg"
                        class="img-fluid d-block w-100" alt="...">
                </div>


                <div class="carousel-item" data-bs-interval="1000">
                    <img src="https://wallpapercave.com/wp/wp3766143.jpg"
                        class="img-fluid d-block w-100" alt="...">
                </div>


            </div>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!--========================================================== -->
        <!-- INTRODUCCION DE SERVICIOS-->
        <!--========================================================== -->


        <section class="d-flex flex-column justify-content-center align-items-center pt-5  text-center w-50 m-auto" id="intro">
            <h1 class="p-3 fs-2 border-top border-3"> <span class="text-success"> “la innovación al servicio de la movilidad”</span></h1>
            <p class="p-3  fs-4">
                <span class="text-success">Michelin.</span> es un empresa francesa 
                especializada en la fabricación de neumáticos fundada por los hermanos Édouard Michelin
                 y André Michelin el 28 de mayo de 1889 desarrollado para neumáticos de bicicleta.
            </p>
        </section>

        <!--========================================================== -->
        <!-- TIPOS DE SERVICIOS-->
        <!--========================================================== -->


        <section>

            <div class="container">
                <div class="row">
                    <div class="col-sm">

                        <div class="text-center">
                            <img class="img-responsive" src="https://image.flaticon.com/icons/png/512/1069/1069102.png"
                                alt="desarrollo" width="180" height="160">

                            <div>
                                <h3 class="fs-5 mt-4 px-4 pb-1 text-success">Venta de neumaticos</h3>
                                <p class="px-4">¡Adquiere tus productos al mejor precio!.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm">
                      <div class="text-center">
                        <img class="img-responsive" src="https://image.flaticon.com/icons/png/512/3486/3486926.png"
                            alt="desarrollo" width="180" height="160">

                        <div>
                            <h3 class="fs-5 mt-4 px-4 pb-1 text-success">Promociones/h3>
                            <p class="px-4">Las mejores promociones las encuentras aquí.</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm">
                      <div class="col-sm">
                        <div class="text-center">
                          <img class="img-responsive" src="https://image.flaticon.com/icons/png/512/3462/3462067.png"
                              alt="desarrollo" width="180" height="160">
  
                          <div>
                              <h3 class="fs-5 mt-4 px-4 pb-1 text-success">Precios</h3>
                              <p class="px-4">Paga de acuerdo a tu presupuesto, siempre encontraras algo para ti.</p>
                          </div>
                      </div>
                      </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="d-flex flex-column justify-content-center align-items-center pt-5  text-center w-50 m-auto" id="intro">
          <h1 class="p-3 fs-2 border-top border-3"> <span class="text-success"> Misión</span>
          <img class="img-responsive"  width="7%" src="https://image.flaticon.com/icons/png/512/3233/3233474.png" alt="">
          </h1>
          <p class="p-3  fs-4">
              <span class="text-success">Misión.</span> 
              Desde la fundación de la empresa en 1891, la misión 
              de Michelin es contribuir, de forma sostenible, con el progreso de la movilidad
               de las personas y de los bienes, facilitando la libertad, la seguridad, la eficiencia
                y el placer de viajar.
          </p>

        <h1 class="p-3 fs-2 border-top border-3"> <span class="text-success"> Visión</span>
        <img class="img-responsive"  width="8%" src="https://image.flaticon.com/icons/png/512/2867/2867280.png" alt="">
        </h1>
        <p class="p-3  fs-4">
            <span class="text-success">Visión.</span> 
            Michelin se compromete a conducir todos los aspectos comerciales de una manera responsable. 
            Esto incluye el desarrollo de soluciones eficientes para satisfacer las expectativas y 
            los deseos de los consumidores y los accionistas, respetarnos al medio ambiente.
            Cada decisión de Michelin está basada en cinco valores fundamentales que promueven 
            el respeto a las personas, a los clientes, a los accionistas, al medio ambiente y a 
            los hechos.
        </p>
    </section>
    



<!--========================================================== -->
                        <!-- SECCION CONTACTOS-->
<!--========================================================== -->

<section id="seccion-contacto" class="border-bottom border-secondary border-2">
  <div id="bg-contactos">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1b2a4e" fill-opacity="1" d="M0,32L120,42.7C240,53,480,75,720,74.7C960,75,1200,53,1320,42.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
  </div>


</section>

<!--========================================================== -->
                        <!--FOOTER-->
<!--========================================================== -->

</div>
<footer class="w-100  d-flex  align-items-center justify-content-center flex-wrap">
  <p class="fs-10 px-3  pt-3 text-dark1">Michelin. &copy; Todos Los Derechos Reservados 2021</p>
  <div>
      <a href="https://m.facebook.com/Michelin/?locale2=es_LA"><i class="fab text-primary fa-facebook fa-2x	mx-2"></i></a>
      <a href="https://twitter.com/michelinmex?lang=es"><i class="fab text-primary fa-twitter fa-2x mx-2	"></i></a>
      <a href="https://www.instagram.com/michelin/?hl=es"><i class="fab text-primary fa-instagram fa-2x	mx-2"></i></a>  
  </div>
  
</footer>

    @else
        {{-- parte del sistema --}}


        <!-- Page Wrapper -->
        <div id="wrapper">
            {{-- incluimos sildebar color: azul :) --}}
            @include('plantilla.sidebar')

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    @include('layouts.nav-log')

                    <!-- Begin Page Content -->
                    <div class="container-fluid rounded color">
                        <br>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 bold-title">SISTEMAS DE NEUMATICOS MICHELIN <i class="fas fa-car"></i> </h1>
                        <p class="mb-4 text-dark">“la innovación al servicio de la movilidad”</p>




                        <!-- DataTales Example -->
                        <div class="card shadow mb-4 rounded card-color">
                            <div class="card-header py-3 bg-color">
                                <h3 class="font-weight-bold  text-center"> ¡Bienvenido, {{ Auth::user()->name }}! <i
                                        class="fas fa-user"></i></h3>
                            </div>


                            <div class="card shadow  rounded card-color">
                                <div class="container text-black2 text-center">
                                    <br>
                                    Bienvenido al sistema de neumaticos Michelin,
                                    esperemos que disfrute de su estancia, Gracias.
                                    <br>
                                    <br>


                                </div>
                                {{-- end container --}}
                            </div>


                        </div>
                        <br> <br> <br> <br> <br> <br> <br> <br>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('plantilla.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

    @endguest
@endsection
