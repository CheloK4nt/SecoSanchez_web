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
        background-color: rgba(112, 112, 112, 0.089);
        text-transform: uppercase;
        letter-spacing: 2px;
        text-decoration: none;
        font-size: 15px;
        overflow: hidden;
        border-radius: 10px;
        transition: 0.2s;
        box-shadow: -1px -1px 1px 1px rgba(255, 255, 255, 0.404);
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

      .vertical-center {
        padding: 10px;
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
      }

      /* FIN ANIMACIONES LOGREG BUTON */

      .nav-btns i{
        font-size: 20px;
      }

      /* ----------FIN DISEÑO NAV BUTTONS---------- */

      .dropdown{
          font-family: 'Raleway', sans-serif;
        }

        .dropdown:focus{
          color: white;
        }

        .dropdown:focus ::after{
          color: rgb(255, 255, 255);
        }

        .dropdown i{
          font-size: 20px;
          color: white;
        }

        .nav-btns:hover i{
          transition: 1s;
          color: rgb(0, 0, 0);
        }

        .dropdown a:focus{
          color: rgb(255, 255, 255);
        }

        .dropdown-item:hover{
          background-color: rgb(88, 88, 88);
          color: white;
        }

</style>

{{-- USER NAV --}}
@auth
@if (Auth::user()->tipo=='U')
<nav class="navbar navbar-expand-lg navbar-dark shadow">
  <div class="container">
    <a href="{{ route('inicio') }}" class="logo-btn">
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
        <a href="{{ route('dossier.index') }}" class="nav-btns">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Dossier
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('tienda') }}" class="nav-btns">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          {{__('messages.tienda')}}
        </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('contacto.index') }}" class="nav-btns">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            {{__('messages.contacto')}}
          </a>
        </li>
      </ul>

      <div class="d-flex justify-content-between">

        <li class="nav-item">
          <a href="{{ route('tienda') }}" class="nav-btns">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <i class="fas fa-shopping-cart ">0</i>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-btns" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
            {{Auth::user()->nombre}}
          </a>
          <ul class="dropdown-menu panel shadow" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('usuarios.panel')}}">{{__('messages.micuenta')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('usuarios.logout') }}">{{__('messages.cerrarsesion')}}</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('usuarios.logout') }}">Cerrar Sesión</a></li>
          </ul>
        </li>
      </div>
    </div>
  </div>
</nav>

{{-- ADMIN NAV --}}
@else
<nav class="navbar navbar-expand-lg navbar-dark shadow">
  <div class="container">
    <a href="{{ route('inicio') }}" class="logo-btn">
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
        <a href="{{ route('dossier.index') }}" class="nav-btns">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Dossier
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('tienda') }}" class="nav-btns">
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
          <a href="{{ route('admin.dashboard') }}" class="nav-btns">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <i class="fas fa-cogs">Panel</i>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('usuarios.panel')}}" class="logreg-btn">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            {{Auth::user()->nombre}}
          </a>
        </li>
      </div>
    </div>
  </div>
</nav>
@endif

@endauth

{{----------- NAVBAR SIN AUTH ----------}}
@guest

	<nav class="navbar navbar-expand-lg navbar-dark shadow">
		<div class="container">
		  <a href="{{ route('inicio') }}" class="logo-btn">
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
					<a href="{{ route('dossier.index') }}" class="nav-btns">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					  Dossier
					</a>
				  </li>

				  <li class="nav-item">
					<a href="{{ route('tienda') }}" class="nav-btns">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					  @lang('messages.tienda')
					</a>
				  </li>

				  <li class="nav-item">
					<a href="{{ route('contacto.index') }}" class="nav-btns">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					  @lang('messages.contacto')
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
					  @lang('messages.ingresar')
					</a>
				  </li>
				  

				  <li class="nav-item">
					<a href="{{ route('usuarios.register') }}" class="logreg-btn">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					  @lang('messages.registro')
					</a>
				  </li>
				</div>
			</div>
		</div>
	</nav>

@endguest
{{----------- FIN NAVBAR SIN AUTH -----------}}