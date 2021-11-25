<!-- Navbar Responsiva con opción de menú 'sandwich' para moviles -->
@include('partials.estilos.css_navbar')
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
          <a href="{{ route('admin.dashboard') }}" class="nav-btns" style="font-size: 16px; font-style: oblique;">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <i class="fas fa-cog tuerca" style="margin-right: 4px;"></i>
            Panel
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