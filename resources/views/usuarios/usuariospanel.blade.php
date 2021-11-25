<!DOCTYPE html>
<html lang="en">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ Auth::check() }}">
<head>
    <title class="text-color white">SecoSanchezWeb</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- BOOTSTRAP --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- HOJAS ESTILO --}}

    {{-- SITE JS --}}
    <script src="{{ url('/static/js/site.js?v='.time()) }}"></script>

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

    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <style>
        header {
            padding-top: 10px;
        }

        label {
            font-family: 'Raleway', sans-serif;
        }

        .form-control:focus {
            box-shadow: inset 0 0px 0px, 0 0 8px rgb(0, 0, 0);
            border-color: black !important;
        }

        body {
            /* padding-inline: 20px; */
            /* background-image: url(/img/login/tapiz1.png); */
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            /* background-color: black; */
        }

        .logo-img {
            margin-top: -100px;
        }

        .main-section {
            margin: 0 auto;
            margin-top: 4%;
            /* margin-bottom: 7%; */
            padding: 0;
        }

        .modal-content {
            /* border-style: solid; */
            /* padding: 10px 20px; */
            border: 20px;
            /* border-color: rgb(0, 0, 0); */
            /* background-color: rgb(255, 255, 255); */
            /* box-shadow: 0px 0px 20px white; */
            font-family: consolas;
        }

        /* .modal-dialog {} */

        .container-form {
            /* border-style: solid;
            border-color: black; */
            padding-top: 1px;
            border-width: 2px;
            background-color: white;
        }

        .container .mensajes {
            border-style: none;
            border-color: black;
        }

        h1 {
            font-family: consolas;
            font-size: 25px;
            /* font-weight: bold; */
            text-transform: uppercase;
            margin-top: 7%;
        }

    </style>
</head>

<header>
    @include('partials.navbar')
</header>

<body>
    @include('partials.idioma-btn');
    @include('partials.preloader')
    
    {{-- <div class="container container-form col-md-7 col-10">
        <table class="table mt-4 table-responsive">
            <div class="form-group">
                <h1 class="text-ligh titulo-login" style="color: rgb(0, 0, 0)">Mis Datos:</h1>
                <hr>
            </div>
            <tbody>
                @foreach ($usuarios as $u)
                    <tr class="align-middle">
                        <th style="background-color: rgb(190, 190, 190); border-radius:10px">Nombre:</th>
                        <td class="body-td">{{ $u->nombre }} {{ $u->apellido }}</td>
                    </tr>
                    <tr>
                        <th class="" style="background-color: rgb(190, 190, 190); border-radius:10px">Dirección:</th>
                        <td class="body-td">{{ $u->direccion }}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgb(190, 190, 190); border-radius:10px">Email:</th>
                        <td class="body-td">{{ $u->email }}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgb(190, 190, 190); border-radius:10px">Teléfono:</th>
                        <td class="body-td">{{ $u->telefono }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    {{-- ------------------------------------------------------------------------------------------------------------- --}}

    <div class="container container-form col-md-7 col-10">
        <div class="col-md-9 col-10 main-section" style="background-color: black">
            <div class="container container-form">
                <form class="col-12">
                    @csrf
                    <div class="form-group">
                        <h1 class="text-ligh titulo-login" style="color: rgb(0, 0, 0)">{{__('messages.misdatos')}}</h1>
                        <hr>
                    </div>
                    {{-- ------------- MENSAJE SUCCESS ------------- --}}
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{__('messages.datosmodificados')}}</strong> {{__('messages.susdatoscorrectos')}}
                        </div>
                    @endif
                    <script>
                        window.setTimeout(function() {
                            $(".alert-success").fadeTo(1500, 0).slideDown(1000, function() {
                                $(this).remove();
                            });
                        }, 5000);
                    </script>
                    {{-- ----------- FIN MENSAJE SUCCESS ----------- --}}
                    <div class="row">
                        {{-- INPUT NOMBRE --}}
                        <div class="col-md-4">
                            <label for="nombre" style="color: black"></label>
                            <div class="input-group mb-3">
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="nombre" name="nombre" value="{{__('messages.nombre')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT NOMBRE --}}
                        <div class="col-md-8">
                            <label for="apellido" style="color: black"></label>
                            <div class="input-group mb-3">
                                @foreach ($usuarios as $u)
                                    <input type="text" class="form-control" id="apellido" name="apellido"
                                        value="{{ $u->nombre }} {{ $u->apellido }}" disabled="disabled"
                                        style="background-color: white">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- INPUT DIRECCION --}}
                        <div class="col-md-4">
                            <label for="direccion" style="color: black"></label>
                            <div class="input-group mb-3">
                                {{-- <span class="input-group-text" id="basic-addon1"></span> --}}
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="direccion" name="direccion" value="{{__('messages.direccion')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT DIRECCION --}}
                        <div class="col-md-8">
                            <label for="direccion" style="color: black"></label>
                            <div class="input-group mb-3">
                                @foreach ($usuarios as $u)
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                        value="{{ $u->direccion }}" disabled="disabled"
                                        style="background-color: white">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- INPUT EMAIL --}}
                        <div class="col-md-4">
                            <label for="email" style="color: black"></label>
                            <div class="input-group mb-3">
                                {{-- <span class="input-group-text" id="basic-addon1"></span> --}}
                                <input style="font-weight: bold" type="text" class="form-control text-center" id="email"
                                    name="email" value="{{__('messages.correoelectronico')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT EMAIL --}}
                        <div class="col-md-8">
                            <label for="email" style="color: black"></label>
                            <div class="input-group mb-3">
                                @foreach ($usuarios as $u)
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $u->email }}" disabled="disabled" style="background-color: white">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- INPUT TELEFONO --}}
                        <div class="col-md-4">
                            <label for="telefono" style="color: black"></label>
                            <div class="input-group mb-3">
                                {{-- <span class="input-group-text" id="basic-addon1"></span> --}}
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="telefono" name="telefono" value="{{__('messages.telefono')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT TELEFONO --}}
                        <div class="col-md-8">
                            <label for="telefono" style="color: black"></label>
                            <div class="input-group mb-3">
                                @foreach ($usuarios as $u)
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        value="{{ $u->telefono }}" disabled="disabled"
                                        style="background-color: white">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col text-center">
                        <a class="btn btn-success" href="{{ route('usuarios.panelEdit') }}">{{__('messages.modificardatos')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<footer>
    @include('partials.footer')
</footer>
