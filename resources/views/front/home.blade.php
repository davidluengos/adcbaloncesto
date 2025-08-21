@extends('front.main')

@section('content')



<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/slider.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                {{-- <h1 class="display-1 text-white mb-5 animated slideInDown"></h1> --}}
                                <p class="texto-slider">#DISFRUTADELRETO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
    </div>
</div>
<!-- Carousel End -->


<!-- Top Feature Start -->
<div class="container-fluid top-feature py-5 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                            <i class="fa fa-pen text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <a href="/docs/ALTA_ABONADOS_ 22-23.pdf">
                                <h4>Hazte Socio</h4>
                                <span>Anima al equipo en Liga Femenina Challenge.</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <a href="/cantera">
                                <h4>Nuestra Cantera</h4>
                                <span>Disfruta con nosotros del baloncesto. ¡Cada vez somos más!</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                            <i class="fa fa-circle text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <a href="http://adcbaloncesto.es">
                                <h4>ADC Baloncesto</h4>
                                <span>Visita la web del ADC. ¡Juntos somos mejores!</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Feature End -->

<!-- Partidos Start-->
<div class="container-xxl py-5" id="partidos">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Partidos LF Challenge</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-4">Últimos partidos</h2>
                @foreach ($ultimosPartidos as $item)
                <div>
                    <div class="d-flex row btn btn-light py-3 justify-content-center align-items-center fs-5 fw-bold text-primary">
                        {{date('d.m.Y', strtotime($item->fecha))}} en {{$item->localidad}}
                        <p class="fw-normal">{{$item->comentario}}</p>
                    </div>
                    <div class="d-flex row btn btn-light py-3 px-4 justify-content-center align-items-center">
                        <div class="col-xs-12 col-md-1 col-lg-12 col-xl-1"><img src="{{$item->equipoLocal->imagen}}" alt="{{$item->equipoLocal->nombre}}" width="60"></div>
                        <div class="col-xs-12 col-md-3 col-lg-12 col-xl-3 texto-ultimopartido-equipo">{{$item->equipoLocal->nombre}}</div>
                        <div class="col-xs-12 col-md-1 col-lg-12 col-xl-1 texto-ultimopartido-resultado">{{$item->resultado_local}}</div>
                        <div class="col-2"></div>
                        <div class="col-xs-12 col-md-1 col-lg-12 col-xl-1"><img src="{{$item->equipoVisitante->imagen}}" alt="{{$item->equipoVisitante->nombre}}" width="60"></div>
                        <div class="col-xs-12 col-md-3 col-lg-12 col-xl-3 texto-ultimopartido-equipo">{{$item->equipoVisitante->nombre}}</div>
                        <div class="col-xs-12 col-md-1 col-lg-12 col-xl-1 texto-ultimopartido-resultado">{{$item->resultado_visitante}}</div>
                    </div>
                    <p></p>
                </div>
                @endforeach


            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-4">Próximo partido</h2>
                @if ($proximoPartido == null)
                    <div class="d-flex row btn btn-light py-3 px-4 justify-content-center align-items-center  fs-5 fw-bold text-primary">
                        <p>No hay partidos a la vista</p>
                    </div>
                @else
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                        <div class="">
                                            <img src="{{$proximoPartido->equipoLocal->imagen}}" alt="{{$proximoPartido->equipoLocal->nombre}}" width="100">
                                        </div>
                                        <h4 class="mb-0">{{$proximoPartido->equipoLocal->nombre}}</h4>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                            <img src="{{$proximoPartido->equipoVisitante->imagen}}" alt="{{$proximoPartido->equipoVisitante->nombre}}" width="100">
                                        </div>
                                        <h4 class="mb-0">{{$proximoPartido->equipoVisitante->nombre}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 120px; height: 120px;">
                                    <img src="/img/lfchallenge-green.png" alt="" style="width: 90px;">
                                    <!-- <i class="fa fa-calendar fa-3x text-primary"></i> -->
                                </div>
                                <h4 class="mb-0">{{date('d.m.Y', strtotime($proximoPartido->fecha))}}</h4>
                                <h3 class="mb-0">{{date('H:i', strtotime($proximoPartido->fecha))}}</h3>
                                <p class="mb-0">{{$proximoPartido->pabellon}}</p>
                                <p class="mb-0">{{$proximoPartido->localidad}}</p>
                                <p class="text-primary">{{$proximoPartido->comentario}}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Partidos End -->




<!-- Facts Start -->
<div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="img/slider.jpg">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <h4 class="display-4 text-white" data-toggle="counter-up">1234</h4>
                <span class="fs-5 fw-semi-bold text-light">CB Al-Qázeres</span>
            </div>
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <h4 class="display-4 text-white" data-toggle="counter-up">1234</h4>
                <span class="fs-5 fw-semi-bold text-light">CB Al-Qázeres</span>
            </div>
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <h4 class="display-4 text-white" data-toggle="counter-up">1234</h4>
                <span class="fs-5 fw-semi-bold text-light">CB Al-Qázeres</span>
            </div>
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <h4 class="display-4 text-white" data-toggle="counter-up">1333</h4>
                <span class="fs-5 fw-semi-bold text-light">CB Al-Qázeres</span>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->

<!-- Imagen retro Start -->
    <div class="" > 
        <img src="img/cabecera.jpg" class="w-100" alt="Responsive image">
    </div>
<!-- Imagen retro End -->

<!-- Projects Start -->
<div class="container-xxl py-5" id="plantilla">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Plantilla</p>
            @if($jugadorasPrimerEquipo->count() == 0)
                <h2>No hay plantilla disponible</h2>
            @else
                <h2 class="display-5 mb-5">{{$jugadorasPrimerEquipo[0]->equipo->nombre}}</h2>
            @endif
        </div>

        <div class="row g-4 portfolio-container">
            @foreach ($jugadorasPrimerEquipo as $jugadora)
            <div class="col-lg-4 col-md-6 portfolio-item second wow ">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="{{$jugadora->imagen}}" alt="">
                    <div class="portfolio-text">
                        <h4 class="text-white mb-4">{{$jugadora->nombre}}</h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2 bold-text">{{$jugadora->numero}}</a>
                        </div>
                        <div class="d-flex">
                            <p class="text-white">{{$jugadora->posicione->nombre}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            @foreach ($staffPrimerEquipo as $staff)
            <div class="col-lg-4 col-md-6 portfolio-item second wow ">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="{{$staff->imagen}}" alt="">
                    <div class="portfolio-text">
                        <h4 class="text-white mb-4">{{$staff->nombre}}</h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2 bold-text"><i class="fa fa-star "></i></a>
                        </div>
                        <div class="d-flex">
                            <p class="text-white">{{$staff->role->nombre}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Projects End -->

@endsection