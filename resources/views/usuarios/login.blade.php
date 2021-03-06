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

        body{
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

        .titulo-login{
            background-color: rgba(255, 255, 255, 0.068);
            border-radius: 7px;
            padding-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-4 formulario p-5 rounded">
                <form class="needs-validation" action="{{ route('usuarios.login') }}" method="POST" novalidate>
                    @csrf
                    <div class="form-group text-center">
                        <h1 class="text-ligh titulo-login" style="color: white">Iniciar Sesi??n</h1>
                    </div>
                    {{-- INPUT EMAIL --}}
                    <label for="email" class="form-label" style="color: white">Correo electr??nico:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                        <input type="text" class="form-control" id="email" name="email" value="{{  old('email') }}"
                            placeholder="Ingrese su correo..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su correo.</div>
                    </div>

                    {{-- INPUT PASSWORD --}}
                    <label for="password" class="form-label" style="color: white">Contrase??a:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Ingrese su contrase??a..." required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Por favor, ingrese su contrase??a.</div>
                    </div>
                    <button type="submit" class="btn btn-success">Ingresar</button>

                    {{-- MENSAJES DE ERROR --}}
                    <div class="container mt-4">
                        @if ($errors->any())
                        <div class="alert alert-info padding-top 5">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="mt-2">{{ $error }}</li>
                                @endforeach
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
