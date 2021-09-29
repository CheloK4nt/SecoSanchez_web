<!DOCTYPE html>
<html lang="en">
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
        <link rel="stylesheet" href="{{ url('/static/css/connect.css?v=' . time()) }}">
    
        {{-- FONT AWESOME --}}
        <script src="https://kit.fontawesome.com/b297a15972.js" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        {{-- STYLES --}}

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;900&family=Source+Sans+Pro:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet">
        <style>
            body{
                padding-top: 10px;
                background-image: url(/img/fondo2pac.png);
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: rgba(255, 255, 255, 0);
                animation: change 5s infinite ease-out;
            }

            @keyframes change{
                20%
                {
                    background-image: url(/img/notoriousfondo.png)
                }
            }

        </style>
    </head>
    
<header>
    @include('partials.navbar')
</header>

<body>

    

    {{-- BUNDLE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>
<footer>
    @include('partials.footer')
</footer>

<svg>
    <defs>
     <filter id='goo'>
      <feGaussianBlur in='SourceGraphic' 
      stdDeviation='10' result='name'/>
       <feColorMatrix in='name' mode='matrix'
           values='1 0 0 0 0
                   0 1 0 0 0 
                   0 0 1 0 0
                   0 0 0 30 -15 ' result='aab'/>
       <feBlend in='SourceGraphic' in2='aab'/>
      </filter>
    </defs>
</svg>

</html>