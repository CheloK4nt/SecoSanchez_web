<!DOCTYPE html>
<html lang="en">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ Auth::check() }}">
<head>
    <title>Contacto</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    {{-- SITE JS --}}
    <script src="{{ url('/static/js/site.js?v='.time()) }}"></script>

    {{-- BOOTSTRAP --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- HOJAS ESTILO --}}

    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/b297a15972.js" crossorigin="anonymous"></script>

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- STYLES --}}
    <style>
        body {
            background-image: url(/img/login/tapiz1.png);
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

        .form-control:focus{
            box-shadow: inset 0 0px 0px , 0 0 8px rgb(0, 0, 0);
            border-color: black !important;
        }

        h1 {
            font-family: 'Raleway', sans-serif;
            font-size: 35px;
            font-weight: bold;
            text-transform: uppercase;
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

        /* ----------DISEÑO ENVIAR BUTTON---------- */
        .enviar-btn {
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

        .enviar-btn:focus {
            background-color: rgb(139, 139, 139) !important;
            color: white;
        }

        .enviar-btn span {
            position: absolute;
            display: block;
        }

        .enviar-btn:hover {
            color: black;
            background-color: rgb(255, 255, 255);
            border-color: black !important;
        }

        .enviar-btn span:hover {
            color: black;
        }

        /* ----------FIN DISEÑO INGRESAR BUTTON---------- */

        /* ----------ANIMACION INGRESAR BUTTON---------- */

        /* Linea superior */
        .enviar-btn span:nth-child(1) {
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, white);
            animation: animate1 1s linear infinite;
        }

        .enviar-btn:hover span:nth-child(1) {
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
        .enviar-btn span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            ;
            height: 100%;
            background: linear-gradient(180deg, transparent, white);
            animation: animate2 1s linear infinite;
            animation-delay: 0.25s;
        }

        .enviar-btn:hover span:nth-child(2) {
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
        .enviar-btn span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, white);
            animation: animate3 1s linear infinite;
            animation-delay: 0.5s;
        }

        .enviar-btn:hover span:nth-child(3) {
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
        .enviar-btn span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, white);
            animation: animate4 1s linear infinite;
            animation-delay: 0.75s;
        }

        .enviar-btn:hover span:nth-child(4) {
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

        .alert-success {
        background-color: rgb(83, 83, 83) !important;
        color: rgb(196, 196, 196);
        border-color: white !important;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        }

        label{
            font-family: 'Raleway', sans-serif;
        }

        .form-label{
            font-weight: bold;
            color: rgb(49, 49, 49);
        }

    </style>
</head>

<body>
    @include('partials.preloader')
    {{----------------------------- FORMULARIO ----------------------}}
    <div class="row-1">
        <div class="col-md-7 col-10 main-section" style="background-color: black">
            <div class="container modal-content">
                <div class="col-12 text-center logo-img mb-2">
                    <img src="/img/login/blessedhands.png" alt="" width="150px">
                </div>
                <form class="col-12 needs-validation" action="{{ route('contacto.email') }}" method="POST" novalidate>
                    
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{__('messages.mensajeenviado')}}</strong> {{__('messages.mensajecorrecto')}}
                        </div>
                    @endif

                    <script>
                        window.setTimeout(function(){
                            $(".alert-success").fadeTo(1500,0).slideDown(1000,function(){
                                $(this).remove();
                            });
                        }, 5000);

                    </script>

                    <div class="form-group text-center">
                        <h1 class="text-ligh titulo-login" style="color: black">{{__('messages.contactaconnosotros')}}</h1>
                    </div>

                    
                    <div class="row">
                        {{-- INPUT NOMBRE --}}
                        <div class="col-md-6">
                            <label for="nombre" style="color: black">{{__('messages.nombre')}}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="{{__('messages.ingresesunombre')}}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">{{__('messages.porfavornombre')}}</div>
                            </div>
                        </div>

                        {{-- INPUT APELLIDO --}}
                        <div class="col-md-6">
                            <label for="apellido" style="color: black">{{__('messages.apellido')}}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
                                <input type="text" class="form-control" id="apellido" name="apellido"
                                    placeholder="{{__('messages.ingresesuapellido')}}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">{{__('messages.porfavorapellido')}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- INPUT CORREO --}}
                        <div class="col-md-6">
                            <label for="email" style="color: black">{{__('messages.correoelectronico')}}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="{{__('messages.ingresesucorreo')}}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">{{__('messages.porfavorcorreo')}}</div>
                            </div>
                        </div>

                        {{-- INPUT TELÉFONO --}}
                        <div class="col-md-6">
                            <label for="telefono" style="color: black">{{__('messages.telefono')}}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></i></span>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    placeholder="{{__('messages.ingresesutelefono')}}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">{{__('messages.porfavortelefono')}}</div>
                            </div>
                        </div>
                    </div>

                    {{-- INPUT MENSAJE --}}
                    <div class="col-md-12">
                        <label for="mensaje" style="color: black">{{__('messages.mensaje')}}</label>
                        <div class="input-group">
                            <textarea  onKeyPress="return taLimit(this)" onKeyUp="return taCount(this,'myCounter')" type="text" style="height: 100px" class="form-control" id="mensaje" name="mensaje" placeholder="{{__('messages.ingresesumensaje')}}" required></textarea>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">{{__('messages.porfavormensaje')}}</div>
                        </div>
                        <small class="form-text text-muted">Carácteres restantes: <b><span style="color: red;" id=myCounter>255</span></b> <span class="text-danger" id="CaracteresRestantes"></span></small>
                    </div>

                    {{-- BOTON ENVIAR --}}
                    <button type="submit" class="btn btn-light enviar-btn mt-4">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        {{__('messages.enviar')}}
                    </button>

                    {{-- BOTON VOLVER --}}
                    <a href="{{ route('inicio') }}" class="volver-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        {{__('messages.volver')}}
                    </a>

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

    <script language = "Javascript">
        /**
         * DHTML textbox character counter script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
         */
        
        maxL=255;
        var bName = navigator.appName;
        function taLimit(taObj) {
            if (taObj.value.length==maxL) return false;
            return true;
        }
        
        function taCount(taObj,Cnt) { 
            objCnt=createObject(Cnt);
            objVal=taObj.value;
            if (objVal.length>maxL) objVal=objVal.substring(0,maxL);
            if (objCnt) {
                if(bName == "Netscape"){	
                    objCnt.textContent=maxL-objVal.length;}
                else{objCnt.innerText=maxL-objVal.length;}
            }
            return true;
        }
        function createObject(objId) {
            if (document.getElementById) return document.getElementById(objId);
            else if (document.layers) return eval("document." + objId);
            else if (document.all) return eval("document.all." + objId);
            else return eval("document." + objId);
        }
    </script>
</body>

</html>
