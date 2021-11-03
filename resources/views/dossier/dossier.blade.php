<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <title class="text-color red">Dossier</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- SITE JS --}}
    <script src="{{ url('/static/js/site.js?v='.time()) }}"></script>

    {{-- BOOTSTRAP --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- HOJAS ESTILO --}}

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

    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <style>
        body{
            margin: 0;
        }

        .fwh-slide{
            height: 100vh;
            background: white;
            box-sizing: border-box;
        }

        .fwh-slide-bg-blue{
            background: grey;
        }

        img{
            
        }
    </style>
</head>

<header>
    @include('partials.preloader')
    {{-- @include('partials.navbar') --}}
</header>
<body>
    <section class="fwh-slide">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum dolorem inventore libero tenetur culpa eos consequuntur illum, quo accusamus temporibus dolorum sint atque voluptatibus? Minus a fugit quisquam illum laudantium.
        {{-- <img src="/img/pw 06.jpg" style="width:100%;height:100%;" alt="" /> --}}
    </section>
    <section class="fwh-slide fwh-slide-bg-blue">
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore obcaecati nobis natus, iste est adipisci laboriosam quaerat. A eveniet eum libero id quos corrupti perspiciatis. Consequuntur ut mollitia repellendus animi.
        </p>
    </section>
</body>

{{-- <footer>
    @include('partials.footer')
</footer> --}}

</html>