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

    {{-- FANCYBOX --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    {{-- CK Editor 4 --}}
    <script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('/static/js/admin.js?v='.time()) }}"></script>

    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

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

        .wrapper .col1{
            /* float: left; */
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 999;
            width: 17%;
        }

        .wrapper .col2{
            float: right;
            width: 83%;
        }

        .navbar{
            position: fixed;
            width: 100%;
            background-color: rgb(46, 46, 46);
            padding-inline: 20px;
            z-index: 100;
        }

        .navbar .titulo-page{
            color: white;
            /* font-family: Impact; */
            font-size: 25px;
            letter-spacing: 5px;
        }

        .navbar .titulo-page:hover{
            font-weight: bold;
        }

        .navbar i{
            color: rgb(121, 121, 121);
        }

        .breadcrumb{
            padding: 12px;
            padding-inline: 15px;
            background-color: rgb(170, 170, 170);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.253);
            border-radius: 3px;
        }

        .page{
            padding-top: 80px;
            padding-bottom: 10px;
        }

        .page a{
            text-decoration: none;
        }

        .breadcrumb-item{
        color: rgb(255, 255, 255);
        }

        .breadcrumb-item:hover{
        color: rgb(131, 131, 131);
        font-weight: bold;
        }

        .form-control:focus{
            box-shadow: inset 0 0px 0px , 0 0 8px rgb(0, 0, 0);
            border-color: black !important;
        }

        .form-select:focus{
            box-shadow: inset 0 0px 0px , 0 0 8px rgb(0, 0, 0);
            border-color: black !important;
        }

        .invalid-feedback{
        color: rgb(51, 51, 51) !important;
        font-weight: bold;
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
                                <i class="fas fa-laptop-house"></i>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="page">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <a class="breadcrumb-item" href="{{ url('/admin') }}">Dashboard</a>
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