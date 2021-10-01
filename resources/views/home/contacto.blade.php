<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contacto</title>

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
            width: 25%;
            margin-top: 20px;

        }

        .btn-secondary {
            background-color: #6d6d6d;
            border-color: #ffffff;
            /*btn-border-radius: 100px;*/
            width: 25%;
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
            <div class="row-md-4 formulario p-5 mb-5 rounded w-75">
                <form class=" row g-3 needs-validation" action="{{ route('contacto.email') }}" method="POST"
                    novalidate>
                    @csrf

                    {{-- @if (session('success'))
                        <script>
                            alert("{{ session('success') }}");
                        </script>

                    @endif --}}

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Mensaje enviado!</strong> El mensaje se ha enviado correctamente.

                        </div>
                    @endif

                    <script>
                        window.setTimeout(function(){
                            $(".alert").fadeTo(1500,0).slideDown(1000,function(){
                                $(this).remove();
                            });
                        }, 2000);

                    </script>

                    <div class="form-group text-center">
                        <h1 class="text-ligh titulo-login" style="color: white">Contacto</h1>
                    </div>
                    {{-- INPUT NOMBRE --}}
                    <div class="col-md-6">
                        <label for="nombre" style="color: white">Nombre:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Ingrese su nombre..." required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                        </div>
                    </div>

                    {{-- INPUT APELLIDO --}}
                    <div class="col-md-6">
                        <label for="apellido" style="color: white">Apellido:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Ingrese su apellido..." required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese su apellido.</div>
                        </div>
                    </div>

                    {{-- INPUT CORREO --}}
                    <div class="col-md-6">
                        <label for="email" style="color: white">Correo electrónico:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Ingrese su correo... " required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese su correo.</div>
                        </div>
                    </div>

                    {{-- INPUT TELÉFONO --}}
                    <div class="col-md-6">
                        <label for="telefono" style="color: white">Teléfono:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></i></span>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                placeholder="Ingrese su teléfono... " required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese su teléfono.</div>
                        </div>
                    </div>

                    {{-- INPUT MENSAJE --}}
                    <div class="col-md-12">
                        <label for="mensaje" style="color: white">Mensaje:</label>
                        <div class="input-group mb-3">
                            <textarea type="text" style="height: 200px" class="form-control" id="mensaje"
                                name="mensaje" placeholder="Ingrese su mensaje... " required></textarea>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese su mensaje.</div>
                        </div>
                    </div>

                    {{-- BOTÓN ENVIAR --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
                    </div>
                    {{-- BOTÓN VOLVER --}}
                    {{-- <a class="btn btn-secondary" href="{{ route('inicio') }}" role="button">Volver</a> --}}
                </form>
                <!-------------- MENSAJE DE ALERTA --------------->
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
