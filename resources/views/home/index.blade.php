<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="routeName" content="{{ Route::currentRouteName() }}">
        <title class="text-color white">SecoSanchezWeb</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        {{-- JQUERY --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        {{-- SITE JS --}}
        <script src="{{ url('/static/js/site.js?v='.time()) }}"></script>
    
        {{-- BOOTSTRAP --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        {{-- HOJAS ESTILO --}}
    
        {{-- FONT AWESOME --}}
        <script src="https://kit.fontawesome.com/b297a15972.js" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        {{-- STYLES --}}

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;900&family=Source+Sans+Pro:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet">
        
        {{-- raleway font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

        {{-- merienda font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&display=swap" rel="stylesheet">

        {{-- BUNDLE --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
        </script>

        <style>

            header{
                padding-top: 10px;
            }
            body{
                background-image: url(/img/homepage/2pac_bg.png);
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: rgba(255, 255, 255, 0);
                animation: change 12s infinite ease-out;
            }

            @keyframes change{
                33%
                {
                    background-image: url(/img/homepage/notorious_bg.png)
                }
                66%
                {
                    background-image: url(/img/homepage/mechon_bg.png)
                }
            }

            .container-firma{
                padding: 5px;
                position: absolute;
                bottom: 50px;
                text-align: end;
            }

            .dropdown{
                padding-top: 20px;
                text-align: end;
                padding-right: 50px;
            }

        </style>
    </head>
    
<header>
    @include('partials.navbar')
</header>

<body>
    <div class="dropdown">
        <button class="dropdown-toggle inline-flex justify center w-full rounded-md border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-offset-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{__('messages.idiomas')}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="{{url('locale/es')}}">Español</a></li>
          <li><a class="dropdown-item" href="{{url('locale/en')}}">Inglés</a></li>
        </ul>
      </div>

    @include('partials.preloader')
    <div class="container-firma container-fluid" style="background-color: rgba(253, 253, 253, 0)">
        <img class="firma" src="/img/homepage/firma_seco.png" alt="" width="200px">
    </div>

    @if (session('success'))
    <script>
        alert("{{session('success')}}");
    </script>        
    @endif

    
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