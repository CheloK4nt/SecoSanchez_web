<!DOCTYPE html>
<html lang="en">

<head>
    <title class="text-color white">SecoSanchezWeb</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- FANCYBOX --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    {{-- ADMIN JS --}}
    <script src="{{ url('/static/js/admin.js?v=' . time()) }}"></script>

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
        header {
            padding-top: 10px;
        }

        /* body{
                background-image: url(/img/homepage/2pac_bg.png);
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: rgba(255, 255, 255, 0);
                animation: change 12s infinite ease-out;
            } */

        /* .cards{
            width: 300px;
            height: 200px;
            margin-bottom: 30px;
            background-color: gray;
            object-fit: cover;
        } */
        
        /* .containers{
            display: flex;
            width: 100%;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1000px;
            margin: auto;
            
        } */

        /* .cards{
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(350px,1fr));
        } */
        
        .containers{
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(350px,1fr));
            width: 95%;
            margin: auto;
            grid-gap: 10px;
            padding: 40px 0;
            overflow: hidden;
            
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
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

    </style>
</head>

<header>
    @include('partials.navbar')
</header>

<body>


    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>


    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>

    @endif

    {{-- <div class="row justify-content-center text-center">
        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 pb-2">
            <div class="card">
                <img src="img/homepage/notorious_bg.png" alt="" class="card-img-top">
            </div>
        </div>
    </div> --}}
    <br>
    <section class="containers">
        @foreach ($dossier as $dossi)
            {{-- <div class="row justify-content-center text-center"> --}}
            {{-- <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 pb-2"> --}}
                {{-- <div class="cards bg-secondary object-fit: fill">
                    <a href="{{ url('/uploads/' . $dossi->file_path . '/' . $dossi->img_dossier) }}">
                        <img src="{{ url('/uploads/' . $dossi->file_path . '/t_' . $dossi->img_dossier) }}"
                            width="64px" data-fancybox="gallery">
                    </a>
                </div> --}}
           {{--  </div> --}}
            {{-- </div> --}}
            <a href="{{ url('/uploads/' . $dossi->file_path . '/' . $dossi->img_dossier) }}">
                <img src="{{ url('/uploads/' . $dossi->file_path . '/t_' . $dossi->img_dossier) }}"
                {{-- width="430px" --}} data-fancybox="gallery">
            </a>
        @endforeach
    </section>
</body>
{{-- <footer>
    @include('partials.footer')
</footer> --}}

</html>
