<!-- Navbar Responsiva con opción de menú 'sandwich' para moviles -->
<style>
    .logo {
            position: absolute;
            right: 50%;
            top: 50%;
            content: '';
            transition: 1s;
            border-radius: 50px;
            z-index:1;
            transform: scale(1.5);
        }

    .logo:hover{
        transform: scale(1.9);
        transition: 0.15s;
    }
</style>

{{-- FIN LOGO --}}

@auth
@if (Auth::user()->tipo=='U')
<nav class="nav navbar navbar-expand-lg navbar-light bg-dark">
	<div class="container">
		<a class="navbar-brand text-light" href="#">Hostal Cousiño</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon justify-content-end"></span>
  		</button>
	  	<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
	    	<ul class="navbar-nav">
	      	<li class="nav-item active">
	        	<a class="nav-link text-light" href="#"><i class="fas fa-home mr-2"></i>Inicio</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="#"><i class="fas fa-id-card-alt mr-2"></i>Contacto</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="#"><i class="fas fa-door-closed mr-2"></i>Habitaciones</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="#"><i class="fas fa-pencil-alt mr-2"></i>Reservar</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="#"><i class="fas fa-info mr-2"></i>Acerca de</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light" href="#"><i class="fas fa-concierge-bell mr-2"></i>Servicios</a>
	      	</li>
	      	<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle text-light btn btn-info mb-1 ml-1 mr-1 p-1 mt-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fas fa-user-circle mr-1"></i> Mi Cuenta
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	            <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Testimonios</a>
                <a class="dropdown-item" href="#">Estadías</a>
                <a class="dropdown-item" href="#">Reservas</a>
	        </div>
	    	</li>
	      	<li class="nav-item">
	        	<a class="nav-link text-light btn btn-danger mb-1 ml-1 mr-1 mt-1 p-1" href="#"><i class="fas fa-sign-out-alt mr-1"></i>Cerrar sesión</a>
	      	</li>
		</ul>
		</div>
	</div>
	{{-- <span class="text-white">Bienvenido, {{Auth::user()->nombre}}! | {{Auth::user()->ID_usuario}}</span> --}}
</nav>
@else
<nav class="nav navbar navbar-expand-lg navbar-light bg-dark">
	<div class="container">
		{{-- <a class="navbar-brand text-light" href="{{ route('front.index') }}">Hostal Cousiño</a> --}}
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon justify-content-end"></span>
  		</button>
	  		<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
	    		<ul class="navbar-nav">
	      		<li class="nav-item active">
	        		{{-- <a class="nav-link text-light" href="{{ route('front.index') }}"><i class="fas fa-home mr-2"></i>Inicio</a> --}}
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link text-light" href="#"><i class="fas fa-id-card-alt mr-2"></i>Contacto</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link text-light" href="#"><i class="fas fa-door-closed mr-2"></i>Habitaciones</a>
	      		</li>
	      		<li class="nav-item">
	        			<a class="nav-link text-light" href="#"><i class="fas fa-pencil-alt mr-2"></i>Reservar</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link text-light" href=#><i class="fas fa-info mr-2"></i>Acerca de</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link text-light" href="#"><i class="fas fa-concierge-bell mr-2"></i>Servicios</a>
	      		</li>
	      		<li class="nav-item dropdown">
        			<a class="nav-link dropdown-toggle text-light btn btn-info mb-1 ml-1 mr-1 p-1 mt-1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            	<i class="fas fa-user-circle mr-1"></i> Funciones
	        		</a>
	        		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	            		<a class="dropdown-item" href="#">Perfil</a>
                		<a class="dropdown-item" href="#">Testimonios</a>
                		<a class="dropdown-item" href="#">Habitaciones</a>
                		<a class="dropdown-item" href="#">Estadías</a>
                		<a class="dropdown-item" href="#">Reservas</a>
						<a class="dropdown-item" href="#">Registrar Funcionario</a>
	        		</div>
	    		</li>
	      		<li class="nav-item">
	        		<a class="nav-link text-light btn btn-danger mb-1 ml-1 mr-1 mt-1 p-1" href="#"><i class="fas fa-sign-out-alt mr-1"></i>Cerrar sesión</a>
	      		</li>
			</ul>
	  	</div>
	</div>
	{{-- <span class="text-white">{{Auth::user()->nombre}} {{Auth::user()->apellido}} | {{Auth::user()->ID_usuario}}</span> --}}
</nav>
@endif

@endauth

<!-- Navbar Sin inicio de sesión -->
@guest
{{-- NAVBAR SIN AUTH --}}
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4fc0ba;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- NAV IZQUIERDA --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link" id="btn-tienda">Tienda</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="btn-galeria">Galería</a>
                </li>
            </ul>

            {{-- LOGO --}}
            <a href="{{ route('welcome') }}">
                <div class="logo">
                    <img src="/img/urb_logo.png" alt="" width="100">
                </div>
            </a>
            {{-- FIN LOGO --}}

            {{-- NAV DERECHA --}}
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link" id="btn-abrir-popup">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('usuarios.register')}}" class="nav-link" id="btn-abrir-popup-registro">Registro</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
{{-- FIN NAVBAR SIN AUTH --}}
@endguest