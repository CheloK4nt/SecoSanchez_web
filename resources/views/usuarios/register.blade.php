<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>

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
        body {
            background-image: url(/img/seco_fondo_login.png);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-color: black;
        }

        .btn-success {
            background-color: #3a9b96;
            border: 0px;
            width: 100%;
            margin-top: 20px;

        }

        .btn-success:hover {
            background: #1e504d;
        }

        .btn-success:focus {
            background: #3a9b96;
        }

        .form-control:focus {
            border-color: rgba(58, 155, 150, 0.438);
            box-shadow: inset 0 5px 5px rgba(0, 0, 0, 0.075), 0 0 8px rgba(31, 160, 160, 0.6);
        }

        .formulario {
            background: rgba(0, 0, 0, 0.842);
            padding: 20px;
            transition: 1s ease all;
            box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.623);
        }

        .input-group-text {
            background: rgba(255, 255, 255, 0.473);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.788);

        }

        .titulo-login {
            background-color: rgba(255, 255, 255, 0.068);
            border-radius: 7px;
            padding-bottom: 5px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-4 formulario p-5 mb-5 rounded">
                <form class="needs-validation" action="{{ route('usuarios.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="form-group text-center">
                        <h1 class="text-ligh titulo-login" style="color: white">Registro</h1>
                    </div>
                    {{-- INPUT NOMBRE --}}
                    <label for="nombre" style="color: white">Nombre:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Ingrese su nombre..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                    </div>

                    {{-- INPUT APELLIDO --}}
                    <label for="apellido" style="color: white">Apellido:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
                        <input type="text" class="form-control" id="apellido" name="apellido"
                            placeholder="Ingrese su apellido..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su apellido.</div>
                    </div>

                    {{-- INPUT DIRECCION --}}
                    <label for="direccion" style="color: white">Dirección:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marked-alt"></i></span>
                        <input type="text" class="form-control" id="direccion" name="direccion"
                            placeholder="Ingrese su dirección..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su dirección.</div>
                    </div>

                    {{-- INPUT CORREO --}}
                    <label for="email" style="color: white">Correo electrónico:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Ingrese su correo... " required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su correo.</div>
                    </div>

                    {{-- INPUT CONTRASEÑA --}}
                    <label for="password" style="color: white">Contraseña:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Ingrese su contraseña..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su contraseña.</div>
                    </div>

                    {{-- INPUT C-CONTRASEÑA --}}
                    <label for="cpassword" style="color: white">Confirme contraseña:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-lock"></i></span>
                        <input type="password" class="form-control" id="cpassword" name="cpassword"
                            placeholder="Confirme su contraseña..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, confirme su contraseña.</div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </form>
                <!-------------- MENSAJE DE ALERTA --------------->
                {{-- @if (Session::has('message'))
                    <div class="container">
                        <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
                            {{ Session::get('message') }}
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <script>
                                $('.alert').slideDown();
                                setTimeout(function() {
                                    $('.alert').slideUp();
                                }, 10000);
                            </script>
                        </div>
                    </div>
                @endif --}}
                <!------------ FIN MENSAJE DE ALERTA ------------->
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
