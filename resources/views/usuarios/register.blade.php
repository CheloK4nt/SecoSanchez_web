<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    {{-- SEPARATE --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>

    {{-- BOOTSTRAP --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- HOJAS ESTILO --}}
    <link rel="stylesheet" href="{{ url('/static/css/connect.css?v=' . time()) }}">

    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/b297a15972.js" crossorigin="anonymous"></script>

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- STYLES --}}
    <style>

        label{
            font-family: 'Raleway', sans-serif;
        }

        .form-control:focus{
            box-shadow: inset 0 0px 0px , 0 0 8px rgb(0, 0, 0);
            border-color: black !important;
        }

        h1 {
            font-family: consolas;
            font-size: 35px;
            font-weight: bold;
            text-transform: uppercase;
        }

        body {
            padding-inline: 20px;
            background-image: url(/img/login/tapiz1.png);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-color: black;
        }

        .logo-img {
            margin-top: -100px;
        }

        .main-section {
            margin: 0 auto;
            margin-top: 20%;
            padding: 0;
        }

        .modal-content {
            border-style: solid;
            padding: 10px 20px;
            border: 20px;
            border-color: rgb(0, 0, 0);
            background-color: rgb(255, 255, 255);
            box-shadow: 0px 0px 20px white;
            font-family: consolas;
        }

        .modal-dialog {}

        .container {
            border-style: solid;
            border-color: black;
            border-width: 10px;
        }

        .container .mensajes {
            border-style: none;
            border-color: black;
        }

        /* ----------DISEÑO INGRESAR BUTTON---------- */
        .registrar-btn {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: rgb(255, 255, 255);
            text-transform: uppercase;
            letter-spacing: 3px;
            text-decoration: none;
            font-family: 'Raleway', sans-serif;
            font-size: 20px;
            overflow: hidden;
            transition: 0.2s;
            background-color: black;
            width: 100%;
            text-align: center;
            border-color: rgb(122, 122, 122);
            border-width: 1px;
            border-radius: 0;
        }

        .registrar-btn:focus {
            background-color: rgb(139, 139, 139) !important;
            color: white;
        }

        .registrar-btn span {
            position: absolute;
            display: block;
        }

        .registrar-btn:hover {
            color: black;
            background-color: rgb(255, 255, 255);
            border-color: black !important;
        }

        .registrar-btn span:hover {
            color: black;
        }

        /* ----------FIN DISEÑO INGRESAR BUTTON---------- */

        /* ----------ANIMACION INGRESAR BUTTON---------- */

        /* Linea superior */
        .registrar-btn span:nth-child(1) {
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, white);
            animation: animate1 1s linear infinite;
        }

        .registrar-btn:hover span:nth-child(1) {
            background: linear-gradient(90deg, transparent, rgb(0, 0, 0));
        }

        @keyframes animate1 {
            0% {
                left: -100%;
            }

            50%,
            100% {
                left: 100%;
            }
        }

        /* fin linea superior */

        /* Linea derecha */
        .registrar-btn span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            ;
            height: 100%;
            background: linear-gradient(180deg, transparent, white);
            animation: animate2 1s linear infinite;
            animation-delay: 0.25s;
        }

        .registrar-btn:hover span:nth-child(2) {
            background: linear-gradient(180deg, transparent, rgb(0, 0, 0));
        }

        @keyframes animate2 {
            0% {
                top: -100%;
            }

            50%,
            100% {
                top: 100%;
            }
        }

        /* fin linea derecha */

        /* Linea inferior */
        .registrar-btn span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, white);
            animation: animate3 1s linear infinite;
            animation-delay: 0.5s;
        }

        .registrar-btn:hover span:nth-child(3) {
            background: linear-gradient(270deg, transparent, rgb(0, 0, 0));
        }

        @keyframes animate3 {
            0% {
                right: -100%;
            }

            50%,
            100% {
                right: 100%;
            }
        }

        /* fin linea inferior */

        /* Linea derecha */
        .registrar-btn span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, white);
            animation: animate4 1s linear infinite;
            animation-delay: 0.75s;
        }

        .registrar-btn:hover span:nth-child(4) {
            background: linear-gradient(90deg, transparent, rgb(0, 0, 0));
        }

        @keyframes animate4 {
            0% {
                top: 100%;
            }

            50%,
            100% {
                top: -100%;
            }
        }

        /* fin linea derecha */


        /* ---------- FIN ANIMACION INGRESAR BUTTON---------- */

        /* ----------DISEÑO VOLVER BUTTONS---------- */
        .volver-btn {
            position: relative;
            display: inline-block;
            padding: 10px 0px;
            color: rgb(0, 0, 0);
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            font-size: 15px;
            overflow: hidden;
            border-radius: 5px;
            transition: 0.2s;
            width: 100%;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            font-family: 'Raleway', sans-serif;
        }

        .volver-btn:hover {
            color: rgb(255, 255, 255);
            background-color: rgb(177, 177, 177);
            box-shadow: 0 0 10px rgb(120, 120, 120), 0 0 10px rgb(120, 120, 120), 0 0 10px rgb(120, 120, 120);
            transition-delay: 0.1s;
        }

        .volver-btn span {
            position: absolute;
            display: block;
        }

        /* ----------FIN DISEÑO VOLVER BUTTONS---------- */

        .alert-secondary {
            background-color: rgb(83, 83, 83) !important;
            color: rgb(196, 196, 196);
        }

    </style>
</head>

<body>
    {{----------------------------- FORMULARIO ----------------------}}
    <div class="modal-dialog">
        <div class="col-sm-10 main-section" style="background-color: black">
            <div class="container modal-content">
                <div class="col-12 text-center logo-img">
                    <img src="/img/login/blessedhands.png" alt="" width="150px">
                </div>
                <form class="col-12 needs-validation" action="{{ route('usuarios.login') }}" method="POST" novalidate>
                    @csrf
                    <div class="form-group text-center">
                        <h1 class="text-ligh titulo-login" style="color: rgb(0, 0, 0)">Regístrate</h1>
                    </div>

                    {{-- INPUT NOMBRE --}}
                    <label for="nombre" style="color: black">Nombre:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Ingrese su nombre..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                    </div>

                    {{-- INPUT APELLIDO --}}
                    <label for="apellido" style="color: black">Apellido:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
                        <input type="text" class="form-control" id="apellido" name="apellido"
                            placeholder="Ingrese su apellido..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su apellido.</div>
                    </div>

                    {{-- INPUT DIRECCION --}}
                    <label for="direccion" style="color: black">Dirección:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marked-alt"></i></span>
                        <input type="text" class="form-control" id="direccion" name="direccion"
                            placeholder="Ingrese su dirección..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su dirección.</div>
                    </div>

                    {{-- INPUT CORREO --}}
                    <label for="email" style="color: black">Correo electrónico:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Ingrese su correo... " required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su correo.</div>
                    </div>

                    {{-- INPUT CORREO --}}
                    <label for="text" style="color: black">Teléfono:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Ingrese su número... " required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su número.</div>
                    </div>

                    {{-- INPUT CONTRASEÑA --}}
                    <label for="password" style="color: black">Contraseña:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Ingrese su contraseña..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su contraseña.</div>
                    </div>

                    {{-- INPUT C-CONTRASEÑA --}}
                    <label for="cpassword" style="color: black">Confirme contraseña:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-lock"></i></span>
                        <input type="password" class="form-control" id="cpassword" name="cpassword"
                            placeholder="Confirme su contraseña..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, confirme su contraseña.</div>
                    </div>
                    
                    {{-- BOTON REGISTRAR --}}
                    <button type="submit" class="btn btn-light registrar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Registrar
                    </button>

                    {{-- BOTON VOLVER --}}
                    <a href="{{ route('inicio') }}" class="volver-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Volver
                    </a>

                    {{-- MENSAJES DE ERROR --}}
                    <div class="container mensajes mt-4">
                        @if ($errors->any())
                            <div class="alert alert-secondary padding-top 5">
                                <ul>
                                    <li class="mt-1 text-start">{{ $errors->first() }}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
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
</html>
