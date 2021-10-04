<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - SSS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- BOOTSTRAP --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- HOJAS ESTILO --}}
    <link rel="stylesheet" href="{{ url('/static/css/connect.css?v=' . time()) }}">

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

    <style>
        body{
            background-color: rgb(95, 95, 95);
            font-size: 14px;
            font-family: 'Raleway', sans-serif;
        }

        h2, h3, h4, h5, ul, body, html{
            padding: 0px;
            margin: 0px;
            color: white;
        }

        .wrapper{
            min-height: 100vh;
            overflow: hidden;
        }

        .col1{
            float: left;
            position: relative;
            z-index: 999;
            width: 17%;
        }

        .col2{
            float: left;
            width: 83%;
        }

        .navbar{
            background-color: rgb(46, 46, 46);
            padding-inline: 20px;
        }

        .navbar .titulo-page{
            color: white;
            /* font-family: Impact; */
            font-size: 25px;
            letter-spacing: 5px;
        }

        .navbar i{
            color: rgb(121, 121, 121);
        }

        .breadcrumb{
            padding: 10px;
            padding-inline: 5px;
            background-color: rgb(170, 170, 170);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.253);
        }

        .page{
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .page a{
            text-decoration: none;
        }

    </style>

</head>
<body>
    
    <div class="wrapper">
        <div class="col1">@include('admin.sidebar')</div>
        <div class="col2">
            <div class="navbar navbar-expand-lg shadow">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/admin') }}" class="nav-link titulo-page">
                                <i class="fas fa-box-open"></i>
                                Productos
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="page">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <a class="breadcrumb-item active" href="{{ url('/admin') }}">Productos</a>
                            <li class="breadcrumb-item" aria-current="page">Library</li>
                            @section('breadcrumb')
                            @show
                        </ol>
                      </nav>
                </div>
                @section('content')
                @show
            </div>
        </div>
    </div>

</body>
</html>