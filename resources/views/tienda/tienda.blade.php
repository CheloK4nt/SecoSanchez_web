<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ Auth::check() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- MDSLIDER JS --}}
    <script src="{{ url('/static/js/mdslider.js?v=' . time()) }}"></script>

    {{-- SITE JS --}}
    <script src="{{ url('/static/js/site.js?v=' . time()) }}"></script>

    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/b297a15972.js" crossorigin="anonymous"></script>

    {{-- SWEET ALERT --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- STYLES --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Raleway:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;900&family=Source+Sans+Pro:ital,wght@0,300;0,700;1,400&display=swap"
        rel="stylesheet">

    {{-- raleway font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

    {{-- merienda font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&display=swap" rel="stylesheet">

    <title>Tienda</title>

    <style>
    </style>

    @include('tienda.estilos.css_tienda')
  </head>

<header>
    @include('partials.navbar')
</header>

<body>
    {{-- ARREGLO CATEGORIAS --}}
    @php
        $categorias = [
            'Cuadros',
            'Poleras',
            'Sprays',
        ];
        $i = 0;
    @endphp
    {{-- FIN ARREGLO CATEGORIAS --}}

    @include('partials.preloader')
    @include('partials.idioma-btn');
    <section>
        <div class="container-fluid container-search">
            <div class="tienda_action_bar shadow">
                <div class="row">
                    <div class="col-md-3">
                        <div class="categorias">
                            <a href=""><i class="fas fa-stream"></i>Categorías</a>
                            <ul class="shadow">
                                @foreach ($categorias as $cat)
                                    @php
                                        $cat_min = strtolower($cat);
                                    @endphp
                                    <li><a href="{{ url('/tienda/'.$cat_min) }}">{{ $cat }}</a></li>
                                @endforeach
                            </ul>
                        </div>                    
                    </div>  
                    
                    <div class="col-md-9">
                        <form class="needs-validation" action="/search" method="POST" novalidate>
                        @csrf
                            <div class="input-group">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control" id="search_query" name="search_query" placeholder="¿Buscas algo?" required>
                                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                                <div class="invalid-feedback">Debe ingresar el NOMBRE a buscar.</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid container-slider mt-3">
            @include('tienda.slider_tienda')
        </div>
    </section>

    <section>
        <h2 class="text-center h2-prods" >PRODUCTOS</h2>
        <hr>
        <div class="container-fluid container-pl">
            <div class="products_list" id="products_list"></div>
            <div class="load_more_products">
                <a href="#" id="load_more_products">Ver más productos</a>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->  
</body>

<footer>
    @include('partials.footer')
</footer>
</html>

<svg>
    <defs>
      <filter id='goo'>
        <feGaussianBlur in='SourceGraphic' 
        stdDeviation='10' result='name'/>
         <feColorMatrix in='name' mode='matrix'
             values='1 0 0 0 0
                     0 1 0 0 0 
                     0 0 1 0 0
                     0 0 0 30 -15 ' result='aab'/>
         <feBlend in='SourceGraphic' in2='aab'/>
      </filter>
    </defs>
</svg>
