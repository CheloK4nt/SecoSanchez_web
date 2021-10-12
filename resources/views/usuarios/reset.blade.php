<!DOCTYPE html>
<html lang="es">

<head>
    <title>Recuperar Contraseña</title>

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
        .form-control:focus {
            box-shadow: inset 0 0px 0px, 0 0 8px rgb(0, 0, 0);
            border-color: black !important;
        }

        h1 {
            font-family: 'Raleway', sans-serif;
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
            margin-top: 7%;
            margin-bottom: 7%;
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
        .ingresar-btn {
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

        .ingresar-btn:focus {
            background-color: rgb(139, 139, 139) !important;
            color: white;
        }

        .ingresar-btn span {
            position: absolute;
            display: block;
        }

        .ingresar-btn:hover {
            color: black;
            background-color: rgb(255, 255, 255);
            border-color: black !important;
        }

        .ingresar-btn span:hover {
            color: black;
        }

        /* ----------FIN DISEÑO INGRESAR BUTTON---------- */

        /* ----------ANIMACION INGRESAR BUTTON---------- */

        /* Linea superior */
        .ingresar-btn span:nth-child(1) {
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, white);
            animation: animate1 1s linear infinite;
        }

        .ingresar-btn:hover span:nth-child(1) {
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
        .ingresar-btn span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            ;
            height: 100%;
            background: linear-gradient(180deg, transparent, white);
            animation: animate2 1s linear infinite;
            animation-delay: 0.25s;
        }

        .ingresar-btn:hover span:nth-child(2) {
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
        .ingresar-btn span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, white);
            animation: animate3 1s linear infinite;
            animation-delay: 0.5s;
        }

        .ingresar-btn:hover span:nth-child(3) {
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
        .ingresar-btn span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, white);
            animation: animate4 1s linear infinite;
            animation-delay: 0.75s;
        }

        .ingresar-btn:hover span:nth-child(4) {
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

        label {
            font-family: 'Raleway', sans-serif;
        }

    </style>
</head>

<body>
    {{-- --------------------------- FORMULARIO -------------------- --}}
    <div class="row-1">
        <div class="col-md-7 col-10 main-section" style="background-color: black">
            <div class="container modal-content">
                <div class="col-12 text-center logo-img">
                    <img src="/img/login/blessedhands.png" alt="" width="150px">
                </div>
                <form class="col-12 needs-validation" action="{{ route('post.reset') }}" method="POST"
                    novalidate>
                    @csrf
                    @method('PUT')
                    {{--------------- MENSAJE SUCCESS ---------------}}
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                             <strong>Correo enviado!</strong> Ingrese el código que le hemos enviado a su correo electrónico.
                        </div>
                    @endif
                    <script>
                        window.setTimeout(function() {
                            $(".alert-success").fadeTo(1500, 0).slideDown(1000, function() {
                                $(this).remove();
                            });
                        }, 5000);
                    </script>
                    {{------------- FIN MENSAJE SUCCESS -------------}}

                    <div class="form-group text-center">
                        <h1 class="text-ligh titulo-login" style="color: rgb(0, 0, 0)">Recuperar Contraseña</h1>
                    </div>
                    {{-- INPUT EMAIL --}}
                    <label for="email" class="form-label text-start" style="color: rgb(0, 0, 0)">Correo
                        electrónico:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $email }}" readonly="readonly"
                            placeholder="Ingrese su correo..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback text-start">Por favor, ingrese su correo.</div>
                    </div>

                    {{-- INPUT CÓDIGO DE RECUPERACIÓN --}}
                    <label for="code" class="form-label text-start" style="color: rgb(0, 0, 0)">Código de recuperación:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                        <input type="number" class="form-control" id="code" name="code" value=""
                            placeholder="Ingrese el código de recuperación..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback text-start">Por favor, ingrese el código de recuperación.</div>
                    </div>

                    {{-- BOTON INGRESAR --}}
                    <button type="submit" class="btn btn-light ingresar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Recuperar Contraseña
                    </button>

                    {{-- BOTON VOLVER --}}
                    <a href="{{ route('inicio') }}" class="volver-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Volver
                    </a>

                    <div style="text-align: center" class="footer mt-16">
                        <a href="{{ route('usuarios.register') }}">No tienes una cuenta? Registrate!</a>
                        <h2></h2>
                        <a href="{{ route('login') }}">Ingresar a mi cuenta</a>
                    </div>

                    {{-- MENSAJES DE ERROR --}}

                    <div class="container mensajes mt-4">
                        @if (Session::has('message'))
                            <div class="alert alert-secondary padding-top 5">
                                <li class="mt-1 text-start">{{ Session::get('message') }}</li>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-secondary ">
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