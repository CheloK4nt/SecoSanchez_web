<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SecoSanchezWeb</title>
    
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

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;900&family=Source+Sans+Pro:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet">
        <style>
            body{
	            font-family: 'Source Sans Pro', sans-serif;
	            font-size: 18;
            }

            .nav{
	            font-family: 'Source Sans Pro', sans-serif;
	            font-size: large;
            }
            h1{
	            font-family: 'Playfair Display', serif;
	            font-weight: 500;
	            font-size: 30;
            }
        </style>
    </head>
<body>
    @include('partials.navbar')
    <h1>SecoSanchezWeb</h1>
</body>
</html>