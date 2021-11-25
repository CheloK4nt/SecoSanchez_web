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

    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

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

    <style>
        header {
            /* padding-top: 10px; */
        }


        label {
            font-family: 'Raleway', sans-serif;
        }

        .form-control:focus {
            box-shadow: inset 0 0px 0px, 0 0 8px rgb(0, 0, 0);
            border-color: black !important;
        }

        body {
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .logo-img {
            margin-top: -100px;
        }

        .main-section {
            margin: 0 auto;
            margin-top: 4%;
            padding: 0;
        }

        .modal-content {
            border: 20px;
            font-family: consolas;
        }

        .container-form {
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
            text-transform: uppercase;
            margin-top: 7%;
        }

    </style>
</head>

<header>
    @include('partials.navbar')
</header>

<body>
    @include('partials.preloader')
    @include('partials.idioma-btn');
    {{-- -------------------------------------CAMBIO DATOS CLIENTE------------------------------------------------------ --}}
    <div class="container container-form col-md-7 col-10">
        <div class="col-md-9 col-10 main-section" style="background-color: black">
            <div class="container container-form">
                <form class="col-12 needs-validation" action="{{ route('usuarios.panelEditPost') }}" method="POST" novalidate>
                    @csrf
                    <div class="form-group">
                        <h1 class="text-ligh titulo-login" style="color: rgb(0, 0, 0)">{{__('messages.datosdeusuario')}}</h1>
                        <hr>
                    </div>

                    {{-- MENSAJES DE ERROR --}}
                    <div class="container mensajes mt-4">
                        @if ($errors->any())
                            <div class="alert alert-secondary padding-top 5">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="mt-1 text-start">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        {{-- LABEL NOMBRE --}}
                        <div class="col-md-4">
                            <label for="lnombre" style="color: black"></label>
                            <div class="input-group mb-3">
                                {{-- <span class="input-group-text" id="basic-addon1"></span> --}}
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="lnombre" name="lnombre" value="{{__('messages.nombre')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT NOMBRE --}}
                        <div class="col-md-8">
                            <label for="nombre" style="color: black"></label>
                            <div class="input-group mb-3">
                                @foreach ($usuarios as $u)
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="{{ $u->nombre }}" style="background-color: white"
                                        placeholder="{{__('messages.ingresesunombre')}}" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">{{__('messages.porfavornombre')}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- LABEL APELLIDO --}}
                        <div class="col-md-4">
                            <label for="lapellido" style="color: black"></label>
                            <div class="input-group mb-3">
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="lapellido" name="lapellido" value="{{__('messages.apellido')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT APELLIDO --}}
                        <div class="col-md-8">
                            <label for="apellido" style="color: black"></label>
                            <div class="input-group mb-3">
                                @foreach ($usuarios as $u)
                                    <input type="text" class="form-control" id="apellido" name="apellido"
                                        value="{{ $u->apellido }}" style="background-color: white"
                                        placeholder="{{__('messages.ingresesuapellido')}}" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">{{__('messages.porfavorapellido')}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- LABEL DIRECCION --}}
                        <div class="col-md-4">
                            <label for="ldireccion" style="color: black"></label>
                            <div class="input-group mb-3">
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="ldireccion" name="ldireccion" value="{{__('messages.direccion')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT DIRECCION --}}
                        <div class="col-md-8">
                            <label for="direccion" style="color: black"></label>
                            <div class="input-group mb-3">
                                @foreach ($usuarios as $u)
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                        value="{{ $u->direccion }}" style="background-color: white"
                                        placeholder="{{__('messages.ingresesudireccion')}}" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">{{__('messages.porfavordireccion')}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- LABEL EMAIL --}}
                        <div class="col-md-4">
                            <label for="lemail" style="color: black"></label>
                            <div class="input-group mb-3">
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="lemail" name="lemail" value="{{__('messages.correoelectronico')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT EMAIL --}}
                        <div class="col-md-8">
                            <label for="email" style="color: black"></label>
                            <div class="input-group mb-3">
                                @foreach ($usuarios as $u)
                                    <input type="text" class="form-control" id="email1" name="email1"
                                        value="{{ $u->email }}" disabled="disabled">

                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $u->email }}" hidden>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- LABEL TELEFONO --}}
                        <div class="col-md-4">
                            <label for="ltelefono" style="color: black"></label>
                            <div class="input-group mb-3">
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="ltelefono" name="ltelefono" value="{{__('messages.telefono')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT TELEFONO --}}
                        <div class="col-md-8">
                            <label for="telefono" style="color: black"></label>
                            <div class="input-group mb-3">
                                @foreach ($usuarios as $u)
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        value="{{ $u->telefono }}" style="background-color: white"
                                        placeholder="{{__('messages.ingresesutelefono')}}" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">{{__('messages.porfavortelefono')}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>

                    {{-- ------------------------CAMBIO CONTRASEÑA--------------------------- --}}
                    <div class="form-group">
                        <h1 class="text-ligh titulo-login" style="color: rgb(0, 0, 0)">{{__('messages.cambiarcontraseña')}}</h1>
                        <hr>
                        <h1 class="text-ligh titulo-login" style="color: rgb(0, 0, 0);font-size: 15px">{{__('messages.dejarenblanco')}}</h1>
                    </div>
                    <div class="row">
                        {{-- LABEL CONTRASEÑA ANTIGUA --}}
                        <div class="col-md-5">
                            <label for="lpasswordantigua" style="color: black"></label>
                            <div class="input-group mb-3">
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="lpasswordantigua" name="lpasswordantigua" value="{{__('messages.contraseñaantigua')}}"
                                    disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT CONTRASEÑA ANTIGUA --}}
                        <div class="col-md-7">
                            <label for="passwordantigua" style="color: black"></label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="passwordantigua" name="passwordantigua"
                                    style="background-color: white" placeholder="{{__('messages.ingresecontraseñaantigua')}}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback text-start">{{__('messages.debeingresarsucontraseña')}}</div>
                            </div>
                        </div>
                    </div>

                    <h1 class="mt-7" style="color: rgb(0, 0, 0);font-size: 15px">*Dejar en blanco si no desea cambiar su contraseña</h1>

                    <div class="row">
                        {{-- LABEL CONTRASEÑA NUEVA --}}
                        <div class="col-md-5">
                            <label for="lnuevapassword" style="color: black"></label>
                            <div class="input-group mb-3">
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="lnuevapassword" name="lnuevapassword" value="{{__('messages.contraseñanueva')}}"
                                    disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT CONTRASEÑA NUEVA --}}
                        <div class="col-md-7">
                            <label for="nuevapassword" style="color: black"></label>
                            <div class="input-group mb-3">

                                <input type="password" class="form-control" id="nuevapassword" name="nuevapassword"
                                    style="background-color: white" placeholder="{{__('messages.ingresecontraseñanueva')}}">


                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- LABEL CONFIRMAR CONTRASEÑA --}}
                        <div class="col-md-5">
                            <label for="lcpassword" style="color: black"></label>
                            <div class="input-group mb-3">
                                <input style="font-weight: bold" type="text" class="form-control text-center"
                                    id="lcpassword" name="lcpassword" value="{{__('messages.confirmarcontraseña')}}" disabled="disabled">
                            </div>
                        </div>

                        {{-- INPUT CONFIRMAR CONTRASEÑA --}}
                        <div class="col-md-7">
                            <label for="cpassword" style="color: black"></label>
                            <div class="input-group mb-3">

                                <input type="password" class="form-control" id="cpassword" name="cpassword"
                                    style="background-color: white" placeholder="{{__('messages.confirmesucontraseña')}}">

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success">
                            {{__('messages.confirmarcambios')}}
                        </button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>

    {{-- SCRIPT VALIDATION --}}
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

<footer>
    @include('partials.footer')
</footer>
