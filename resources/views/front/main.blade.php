<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>CB Al-Qázeres Extremadura - {{$title}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="Toda la información sobre el Club Baloncesto Al-Qázeres Extremadura que milita en Liga Femenina Challenge" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center">
                    {{-- <span class="far fa-envelope me-2"></span>
                    <span>info@cbalqazeres.es</span> --}}
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <span>Síguenos:</span>
                    <a class="btn btn-link text-light" target="_blank" href="https://www.facebook.com/cbalqazeres"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" target="_blank" href="https://twitter.com/cb_alqazeres"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" target="_blank" href="https://www.instagram.com/cbalqazeres/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="/img/logo_alqazeres.jpg" alt="" width="60px">
            <h1 class="m-0 titulo-movil">&nbsp Alter Enersun</br>&nbspAl-Qázeres Extremadura</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="http://cbalqazeres.es/#partidos" class="nav-item nav-link">Partidos</a>
                <a href="http://cbalqazeres.es/#plantilla" class="nav-item nav-link">Plantilla</a>
                <a href="/clasificacion" class="nav-item nav-link">Clasificación</a>
                <a href="/noticias" class="nav-item nav-link">Actualidad</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Contacto<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    @if ($title != 'Inicio')
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-3 text-white mb-4 animated slideInDown">{{$title}}</h1>
            </div>
        </div>
        <!-- Page Header End -->
    @endif


    @yield('content')

    @inject('patrocinadores', 'App\Models\Patrocinadore')
    @php
    $patrocinadoresPrincipales = $patrocinadores->patrocinadoresPrincipales();
    $patrocinadoresInstitucionales = $patrocinadores->patrocinadoresInstitucionales();
    $patrocinadoresNormales = $patrocinadores->patrocinadoresNormales();
    @endphp

    <!-- Patrocinadores Start -->
    <div class="container-xxl py-5">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Patrocinadores y Colaboradores</p>
            <h2>¡Gracias por vuestro apoyo!</h2>
        </div>
        <div class="row">
            @foreach ($patrocinadoresPrincipales as $patrocinador)
            <img class="patrocinadoresPrincipales" data-wow-delay="0.1s" src="{{$patrocinador->imagen}}" alt="{{$patrocinador->nombre}}">
            @endforeach
        </div>
        <hr>
        <div class="row">
            @foreach ($patrocinadoresInstitucionales as $patrocinador)
            <img class="patrocinadoresInstitucionales" data-wow-delay="0.1s" src="{{$patrocinador->imagen}}" alt="{{$patrocinador->nombre}}">
            @endforeach
        </div>
        <hr>
        <div class="row">
            @foreach ($patrocinadoresNormales as $patrocinador)
            <img class="patrocinadoresNormales" data-wow-delay="0.1s" src="{{$patrocinador->imagen}}" alt="{{$patrocinador->nombre}}">
            @endforeach
        </div>
    </div>
    <!-- Patrocinadores End-->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">CB Al-Qázeres</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Cáceres</p>
                    {{-- <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@cbalqazeres.es</p> --}}
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" target="_blank" href="https://www.facebook.com/cbalqazeres"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" target="_blank" href="https://twitter.com/cb_alqazeres"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" target="_blank" href="https://www.instagram.com/cbalqazeres/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Secciones</h4>
                    <a class="btn btn-link" href="http://cbalqazeres.es/#partidos">Partidos</a>
                    <a class="btn btn-link" href="/clasificacion">Clasificación</a>
                    <a class="btn btn-link" href="http://cbalqazeres.es/#plantilla">Plantilla </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Enlaces</h4>
                    <a class="btn btn-link" href="/aviso-legal">Aviso Legal</a>
                    <a class="btn btn-link" href="">Cookies</a>
                </div>
                <div class="col-lg-3 col-md-6">
                        <!-- <div class="row">
                            <div class="col-4">
                                <img class="w-75" data-wow-delay="0.1s"  src="/storage/img/lfc.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="w-75" data-wow-delay="0.1s" src="/storage/img/lfc.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="w-75" data-wow-delay="0.1s"  src="/storage/img/lfc.jpg" alt="">
                            </div>
                        </div> -->
                    <!-- <h4 class="text-white mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-light border-light w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; CB Al-Qázeres
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Hecho con <i class="fa fa-heart"></i> por <a href="https://greetik.com">Greetik Soluciones</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/counterup/counterup.min.js"></script>
    <script src="/lib/parallax/parallax.min.js"></script>
    <script src="/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>
</body>

</html>