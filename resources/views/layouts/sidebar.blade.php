<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('partidosSinResultados.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('partidos.index') }}">
            <i class="fas fa-fw fa-trophy "></i>
            <span>Partidos</span>
        </a>
        <a class="nav-link" href="{{ route('equipos.index') }}">
            <i class="fas fa-fw fa-cubes "></i>
            <span>Equipos</span>
        </a>
        <a class="nav-link" href="{{ route('jugadores.index') }}">
            <i class="fas fa-fw fa-users "></i>
            <span>Jugadores</span>
        </a>
        <a class="nav-link" href="{{ route('temporada.index') }}">
            <i class="fas fa-fw fa-calendar "></i>
            <span>Temporadas</span>
        </a>
        <a class="nav-link" href="{{ route('patrocinadores.index') }}">
            <i class="fas fa-fw fa-handshake "></i>
            <span>Patrocinadores</span>
        </a>
        <a class="nav-link" href="{{ route('noticias.index') }}">
            <i class="fas fa-fw fa-newspaper "></i>
            <span>Noticias</span>
        </a>
        <a class="nav-link" href="{{ route('posiciones.index') }}">
            <i class="fas fa-fw fa-compress "></i>
            <span>Posiciones</span>
        </a>
        <a class="nav-link" href="{{ route('categorias.index') }}">
            <i class="fas fa-fw fa-database "></i>
            <span>Categorías</span>
        </a>
        <a class="nav-link" href="{{ route('roles.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Roles</span>
        </a>
        <a class="nav-link" href="{{ route('generos.index') }}">
            <i class="fas fa-fw fa-venus-mars "></i>
            <span>Géneros</span>
        </a>
        <a class="nav-link" href="{{ route('patrocinador-tipos.index') }}">
            <i class="fas fa-fw fa-briefcase "></i>
            <span>Tipos de Patrocinadores</span>
        </a>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
