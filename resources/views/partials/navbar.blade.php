<!-- Navbar Responsiva con opción de menú 'sandwich' para moviles -->
<style>
	li{
        list-style-type: none;
        margin: 5px;
      }

	.navbar{
        background-color: rgb(0, 0, 0);
      }

      /* ----------DISEÑO LOGO BUTTON---------- */
      .logo-btn{
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: rgb(255, 255, 255);
        text-transform: uppercase;
        letter-spacing: 3px;
        text-decoration: none;
        font-family: Impact;
        font-size: 20px;
        overflow: hidden;
        transition: 0.2s;
      }

      .logo-btn span{
        position: absolute;
        display: block;
      }

      .logo-btn:hover{
        color: black;
        background-color: rgb(255, 255, 255);
      }

      .logo-btn span:hover{
        color: black;
      }
      /* ----------FIN DISEÑO LOGO BUTTON---------- */

      /* ----------ANIMACION LOGO BUTTON---------- */

      /* Linea superior */
      .logo-btn span:nth-child(1){
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, white);
        animation: animate1 1s linear infinite;
      }

      .logo-btn:hover span:nth-child(1){
        background: linear-gradient(90deg, transparent, rgb(0, 0, 0));
      }

      @keyframes animate1{
        0%
        {
          left: -100%;
        }
        50%,100%
        {
          left: 100%;
        }
      }
      /* fin linea superior */
      
      /* Linea derecha */
      .logo-btn span:nth-child(2){
        top: -100%;
        right: 0;
        width: 2px;;
        height: 100%;
        background: linear-gradient(180deg, transparent, white);
        animation: animate2 1s linear infinite;
        animation-delay: 0.25s;
      }

      .logo-btn:hover span:nth-child(2){
        background: linear-gradient(180deg, transparent, rgb(0, 0, 0));
      }

      @keyframes animate2{
        0%
        {
          top: -100%;
        }
        50%,100%
        {
          top: 100%;
        }
      }
      /* fin linea derecha */

      /* Linea inferior */
      .logo-btn span:nth-child(3){
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent, white);
        animation: animate3 1s linear infinite;
        animation-delay: 0.5s;
      }

      .logo-btn:hover span:nth-child(3){
        background: linear-gradient(270deg, transparent, rgb(0, 0, 0));
      }

      @keyframes animate3{
        0%
        {
          right: -100%;
        }
        50%,100%
        {
          right: 100%;
        }
      }
      /* fin linea inferior */

      /* Linea derecha */
      .logo-btn span:nth-child(4){
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg, transparent, white);
        animation: animate4 1s linear infinite;
        animation-delay: 0.75s;
      }

      .logo-btn:hover span:nth-child(4){
        background: linear-gradient(90deg, transparent, rgb(0, 0, 0));
      }

      @keyframes animate4{
        0%
        {
          top: 100%;
        }
        50%,100%
        {
          top: -100%;
        }
      }
      /* fin linea derecha */

      
      /* ---------- FIN ANIMACION LOGO BUTTON---------- */

      /* ----------DISEÑO NAV BUTTONS---------- */
      .nav-btns{
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: rgb(255, 255, 255);
        text-transform: uppercase;
        letter-spacing: 2px;
        text-decoration: none;
        font-size: 15px;
        overflow: hidden;
        border-radius: 10px;
        transition: 0.2s;
        font-family: 'Raleway', sans-serif;
      }

      .nav-btns:hover{
        color: rgb(0, 0, 0);
        background-color: rgb(255, 255, 255);
        box-shadow: 0 0 10px white, 0 0 40px white, 0 0 80px white;
        transition-delay: 0.1s;
      }

      .nav-btns span{
        position: absolute;
        display: block;
      }
      /* ----------FIN DISEÑO NAV BUTTONS---------- */

      /* ----------DISEÑO LOGIN/REGISTER BUTTONS---------- */
      .logreg-btn{
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: rgb(255, 255, 255);
        background-color: rgba(255, 255, 255, 0.048);
        text-transform: uppercase;
        letter-spacing: 2px;
        text-decoration: none;
        font-size: 15px;
        overflow: hidden;
        border-radius: 10px;
        transition: 0.2s;
        box-shadow: -1px -1px 1px 1px rgba(255, 255, 255, 0.527);
        font-family: 'Raleway', sans-serif;
      }

      .logreg-btn:before{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 100%;
        background: rgba(255, 255, 255, 0.137);
      }

      .logreg-btn:after{
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.315));
        transition: 0.4s;
        transition-delay: 0.5s;
      }

      .logreg-btn:hover:after{
        left: 100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.315));
        transition: 0.5s;
        transition-delay: 0.5s;
      }

      .logreg-btn:hover{
        color: white;
      }

      .logreg-btn span{
        position: absolute;
        display: block;
        transition: 0.5s ease;
      }

      /* ANIMACIONES LOGREG BUTON */
      .logreg-btn span:nth-child(1){
        top: 0;
        left: 0;
        width: 0;
        height: 1px;
        background: #fff;
      }

      .logreg-btn:hover span:nth-child(1){
        width: 100%;
        transform: translateX(100%);
      }

      .logreg-btn span:nth-child(3){
        bottom: 0;
        right: 0;
        width: 0;
        height: 1px;
        background: #fff;
      }

      .logreg-btn:hover span:nth-child(3){
        width: 100%;
        transform: translateX(-100%);
      }

      .logreg-btn span:nth-child(2){
        top: 0;
        left: 0;
        width: 1px;
        height: 0;
        background: #fff;
      }

      .logreg-btn:hover span:nth-child(2){
        height: 100%;
        transform: translateY(100%);
      }

      .logreg-btn span:nth-child(4){
        bottom: 0;
        right: 0;
        width: 1px;
        height: 0;
        background: #fff;
      }

      .logreg-btn:hover span:nth-child(4){
        height: 100%;
        transform: translateY(-100%);
      }

      /* FIN ANIMACIONES LOGREG BUTON */

      /* ----------FIN DISEÑO NAV BUTTONS---------- */
</style>


@auth
@if (Auth::user()->tipo=='U')
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a href="{{ route('welcome') }}" class="logo-btn">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    SecoSanchez
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
        <a href="Dossier" class="nav-btns">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Dossier
        </a>
        </li>

        <li class="nav-item">
        <a href="Tienda" class="nav-btns">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Tienda
        </a>
        </li>

        <li class="nav-item">
        <a href="contacto" class="nav-btns">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Contacto
        </a>
        </li>
      </ul>
      <div class="d-flex justify-content-between">
        <li class="nav-item">
        <a href="usuario" class="logreg-btn">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          {{Auth::user()->email}}
        </a>
        </li>
        

        <li class="nav-item">
        <a href="{{ route('usuarios.logout') }}" class="logreg-btn">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Cerrar Sesión
        </a>
        </li>
      </div>
    </div>
  </div>
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

{{----------- NAVBAR SIN AUTH ----------}}
@guest

	<nav class="navbar navbar-expand-lg navbar-dark">
		<div class="container">
		  <a href="{{ route('welcome') }}" class="logo-btn">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			SecoSanchez
		  </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav mx-auto">
				  <li class="nav-item">
					<a href="Dossier" class="nav-btns">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					  Dossier
					</a>
				  </li>

				  <li class="nav-item">
					<a href="Tienda" class="nav-btns">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					  Tienda
					</a>
				  </li>

				  <li class="nav-item">
					<a href="{{ route('contacto.index') }}" class="nav-btns">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					  Contacto
					</a>
				  </li>
				</ul>

				<div class="d-flex justify-content-between">
				  <li class="nav-item">
					<a href="{{ route('login') }}" class="logreg-btn">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					  Ingresar
					</a>
				  </li>
				  

				  <li class="nav-item">
					<a href="{{ route('usuarios.register') }}" class="logreg-btn">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					  Registro
					</a>
				  </li>
				</div>
			</div>
		</div>
	</nav>

@endguest
{{----------- FIN NAVBAR SIN AUTH -----------}}