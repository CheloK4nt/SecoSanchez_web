<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ Auth::check() }}">

    <title class="text-color white">SecoSanchezWeb</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- FANCYBOX --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    {{-- SITE JS --}}
    <script src="{{ url('/static/js/site.js?v=' . time()) }}"></script>

    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
    </script>

    {{-- BOOTSTRAP --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- SEET ALERT --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- HOJAS ESTILO --}}
    {{-- <link rel="stylesheet" href="{{ url('/static/css/connect.css?v=' . time()) }}"> --}}

    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/b297a15972.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <style>
        
        .containers{
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(350px,1fr));
            width: 95%;
            margin: auto;
            grid-gap: 10px;
            padding: 0px !important;
            overflow: hidden;
            margin-top: 0px !important;
            
        }
        .containers > a{
            display: block;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 6px rgba(0, 0, 0, .5);
            
        }
        .containers img{
            width: 100%;
            vertical-align: top;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .containers a:hover img{
            filter: blur(5px);
            transform: rotate(10deg) scale(1.3);
        }
        {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .containers a{
            text-decoration: none;
            border: 2px solid;
            border-color: black;
        }

        .titulo-dossier{
            background-color: rgba(0, 0, 0, 0.719);
            bottom: 0px;
            color: white;
            display: block;
            margin: 0px !important;
            padding: 5px !important;
            position: absolute;            
            text-align: center;
            width: 100%;
            z-index: 2 !important;
        }

        .containers a:hover .titulo-dossier{
            background-color: rgba(255, 255, 255, 0.719);
            color: rgb(0, 0, 0);
        }
        .fancybox__caption {
            font-size: 30px;
            text-align: center;
        }

        .container-titulo{
            width: 100%;
            text-align: center;
            padding: 0px;
            margin-top:calc(10px + 1vw);
        }

        .title-dossier{
            font-size:calc(10px + 3.5vw);
            /* font-size: 3.5vw; */
            font-family: 'Raleway', sans-serif;
            margin-bottom: 0px;
        }

    </style>
</head>

<header>
    @include('partials.navbar')
</header>

<body>

    @include('partials.preloader')


    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>

    @endif

    <div class="container container-fluid container-titulo">
        <h2 class="title-dossier">DOSSIER</h2>
    </div>
    

    <br>
    <section class="containers">
        @foreach ($dossier as $dossi)
            <a href="{{ url('/uploads/dossier/' . $dossi->file_path . '/' . $dossi->img_dossier) }}">
                <img class="img-dossier" src="{{ url('/uploads/dossier/' . $dossi->file_path . '/t_' . $dossi->img_dossier) }}" {{-- width="430px" --}} data-fancybox="gallery" data-caption="{{ $dossi->titulo_dossier }}">
                <h4 class="title titulo-dossier">{{ $dossi->titulo_dossier }}</h4>
            </a>
        @endforeach
    </section>
</body>
<footer>
    @include('partials.footer')
</footer>
</html>
