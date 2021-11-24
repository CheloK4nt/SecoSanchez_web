<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ Auth::check() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- MDSLIDER JS --}}
    <script src="{{ url('/static/js/mdslider.js?v=' . time()) }}"></script>

    {{-- SITE JS --}}
    <script src="{{ url('/static/js/site.js?v=' . time()) }}"></script>

    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/b297a15972.js" crossorigin="anonymous"></script>

    {{-- SWEET ALERT --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <title>Tienda</title>

    <style>

        body{
            background: rgb(230, 230, 230);
        }

        .tienda_action_bar{
            background: white;
            border-radius: 4px;
            margin-top: 20px;
            padding: 5px;
            }
            .tienda_action_bar form{
                
            }
            .tienda_action_bar .categorias{
                position: relative;
                transition: 0.2s;
                }
                .tienda_action_bar .categorias:hover ul{
                    z-index: 100;
                    display: block;
                }
                .tienda_action_bar .categorias a{
                    border-radius: 4px;
                    background-color: black;
                    color: white;
                    display: block;
                    padding: 12px;
                    text-transform: uppercase;
                    width: 100%;
                    text-decoration: none;
                    }
                    .tienda_action_bar .categorias a:hover{
                        background-color: rgb(48, 48, 48);
                        border-bottom-right-radius: 0px;
                        border-bottom-left-radius: 0px;
                    }
                    .tienda_action_bar .categorias a i{
                        padding-inline: 10px;
                    }
                .tienda_action_bar .categorias ul{
                    display: none;
                    list-style: none;
                    padding: 0px !important;
                    margin: 0px !important;
                    position: absolute;
                    width: 100%;
                    }
                    .tienda_action_bar .categorias ul li{
                        padding: 0px !important;
                        margin: 0px !important;
                        }
                        .tienda_action_bar .categorias ul li a{
                            background: rgb(90, 90, 90);
                            border-radius: 0px;
                            }
                            .tienda_action_bar .categorias ul li a:hover{
                                background: rgb(180, 180, 180);
                                color: black;
                            }
            .tienda_action_bar .input-group{
                position: relative;
                }
                .tienda_action_bar .input-group i{
                    position: absolute;
                    top: 12px;
                    left: 10px;
                    z-index: 10;
                    font-size: 24px;
                    transition: 0.2s;
                }   
                .tienda_action_bar .input-group .form-control{
                    padding: 11px;
                    padding-inline: 45px;
                    border-radius: 4px 0px 0px 4px !important;
                    }
                    .tienda_action_bar .input-group .form-control:focus{
                        box-shadow: inset 0 0px 0px , 0 0 8px rgb(0, 0, 0);
                        border-color: black !important;
                    }
                    .tienda_action_bar .input-group:focus-within .btn-outline-secondary{
                        background: rgb(0, 0, 0);
                        color: white;
                    }
                    .tienda_action_bar .input-group:focus-within i{
                        transform: scaleX(-1);
                        -moz-transform: scaleX(-1);
                        -webkit-transform: scaleX(-1);
                        -ms-transform: scaleX(-1);
                        transition: 0.5s;
                    }
                    .tienda_action_bar .input-group:focus-within .btn-outline-secondary{
                        box-shadow: inset 0 0px 0px , 0 0 8px rgb(0, 0, 0);
                        border-color: black !important;
                    }
                .tienda_action_bar .input-group .btn-outline-secondary:hover{
                    background: rgb(90, 90, 90);
                }        
        /* FIN TIENDA ACTION BAR */

        .row{
            padding-inline: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .container-search{
            width: 85%;
        }

        .container-slider{
            width: 85%;
        }

        .mdslider{
            display: flex;
            flex-wrap: wrap;
            margin-top: 24px;
            overflow: hidden;
            min-height: 380px;
            position: relative;
            width: 100%;
            border-radius: 4px;
            }
            .mdslider .md-slider-item{
                align-items: center;
                display: none;
                background: rgb(255, 255, 255);
                color: rgb(0, 0, 0);
                font-size: 4em;
                justify-content: center;
                position: absolute;
                min-height: 380px;
                width: 100% !important;
                transition: 0.4s ease-in-out;
            }
            .mdslider .ul{
                /* ul */
                }
                .mdslider ul.navigation{
                    display: block;
                    margin: 0px;
                    padding: 0px;
                    position: absolute;
                    width: 100%;
                    top: 35%;
                    z-index: 9;
                }
                .mdslider ul li{
                    display: inline-flex;
                    float: left;
                    padding: 0px;
                    margin: 0px;
                    }
                    .mdslider ul li a{
                        background: rgba(0, 0, 0, 0.5);
                        color: white;
                        font-size: 4em;
                        transition: 0.25s;
                        padding: 5px;
                    }
                    .mdslider ul li .a-izq{
                        border-bottom-right-radius: 30px;
                        border-top-right-radius: 30px;
                    }
                    .mdslider ul li .a-der{
                        border-bottom-left-radius: 30px;
                        border-top-left-radius: 30px;
                    }
                    .mdslider ul li a:hover{
                        background: rgb(0, 0, 0);
                        color: white;
                    }
                    .mdslider ul li:last-child{
                        float: right;
                    }
                
        /* FIN MD SLIDER */

        .carousel{
            z-index: 0;
            }
            .carousel-control-prev{
                transition: 0.2s;
                }
                .carousel-control-prev:hover{
                    transition: 0.2s;
                    background: rgba(0, 0, 0, 0.3);
            }
            .carousel-control-next{
                transition: 0.2s;
                }
                .carousel-control-next:hover{
                    transition: 0.2s;
                    background: rgba(0, 0, 0, 0.3);
            }
        /* FIN CAROUSEL */

        .container.container-slide-text{
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            max-width: 50%;
            border-left: 4px solid;
            border-right: 4px solid;
            border-color: white;
        }

        .container-pl{
            width: 87%;
        }

        .products_list{
            display: block;
            padding: 17px;
            margin-top: 0.5vw;
            overflow: hidden;
            width: 100%;     
            }
            /* PRODUCTO NORMAL */
            .products_list .product{
                margin-top: 15px;
                border-radius: 4px;
                background-color: rgba(0, 0, 0, 0.137);
                display: inline-block;
                margin-bottom: 15px;
                margin-right: 1.25%;
                position: relative;
                width: 19%;
                transition: 0.3s;
                }
                .products_list .product a{
                    text-decoration: none;
                    color: transparent;
                    transition: 0.2s;
                }
                .products_list .product:hover a{
                    text-decoration: none;
                }
                .products_list .product:hover{
                    background-color: rgba(0, 0, 0, 0.384);
                    box-shadow: -0px 3px 5px 5px rgb(90, 90, 90);
                    border-bottom-right-radius: 20px;
                    border-bottom-left-radius: 20px;
                    transition: 0.2s;
                }
                .products_list .product:nth-child(5n){
                    margin-right: 0px;
                }
                .products_list .product .image{
                    display: block;
                    width: 100%;
                    position: relative;
                    overflow: hidden;
                    padding: 10px; 
                    padding-bottom: 0px;                  
                    text-align: center;                    
                    }
                    .products_list .product .image .overlay{
                        display: none;
                        position: absolute;
                        transition: 0.2s;
                        z-index: 4;
                        }
                        .products_list .product:hover .overlay{
                            display: block;
                            transition: 0.2s;
                        }
                        .products_list .product .image .overlay .btns{
                            background-color: rgba(0, 0, 0, 0.8);
                            border-bottom-right-radius: 4px;
                            display: inline-block;
                            margin: 1px;
                            padding: 0.6vw;
                            transition: 0.2s;
                            }
                            .products_list .product:hover .overlay .btns{
                                transition: 0.2s;
                            }
                            .products_list .product .image .overlay .btns a{  
                                background-color: rgb(255, 255, 255);
                                border-radius: 4px;
                                margin-bottom: 0.4vw;
                                padding: 0.5vw;
                                font-size: 1.5vw;  
                                display: block;
                                float: left;
                                text-align: center;      
                                width: 100%;                      
                                color: black;
                                }
                                .products_list .product .image .overlay .btns a:hover{
                                    background-color: rgb(112, 112, 112);
                                    color: white;
                                    border-color: white;
                    }
                    .products_list .product .image img{
                        display: block;
                        width: 100%;
                        border-radius: 4px;
                        border: 4px solid;
                        border-color: rgb(0, 0, 0);
                        transition: 0.2s;
                        }
                        .products_list .product:hover img{
                            transform: scale(1.02);
                            transition: 0.2s;
                            border-bottom: 10px;
                }

                .products_list .product .categoria{
                    z-index: -1;
                    font-size: 14px;
                    font-weight: bolder;
                    padding-top: 8px;
                    padding-inline: 10px;
                    text-transform: uppercase;
                }

                .products_list .product:hover .categoria{
                    color: white;
                }

                .products_list .product .title{
                    background-color: white;
                    color: rgb(0, 0, 0);
                    display: block;
                    font-weight: bolder;
                    font-size: 100%;
                    margin: 0px;
                    overflow: hidden;
                    padding: 0px 10px 0px 10px;
                    text-overflow: ellipsis;
                    transition: 0.3s;
                    text-align: center;
                    white-space: nowrap;
                    width: 100%;
                    }
                    .products_list .product:hover .title{
                    /* color: white; */
                    transition: 0.2s;
                }
                .products_list .product .price{
                    background-color: rgb(140, 140, 140);
                    border-bottom-right-radius: 4px;
                    border-bottom-left-radius: 4px;
                    color: rgb(0, 0, 0);
                    text-align: end;
                    font-weight: bolder;
                    padding: 8px;
                    display: block;
                    width: 100%;
                    transition: 0.3s;
                    }
                    .products_list .product:hover .price{
                        background-color: rgb(0, 0, 0);
                        color: white;
                        transition: 0.2s;
                        border-bottom-right-radius: 20px;
                        border-bottom-left-radius: 20px;
                }
                .products_list .product .options{
                    display: block;
                    width: 100%;
            }
            /* FIN PRODUCTO NORMAL */

            /* PRODUCTO EN OFERTA */

            .precios-oferta{
                background-color: rgb(140, 140, 140);
                border-bottom-right-radius: 4px;
                border-bottom-left-radius: 4px;
                color: rgb(0, 0, 0);
                display: inline-flex;
                font-weight: bolder;
                justify-content: space-between;
                padding: 8px;
                text-align: end;
                width: 100%;
                transition: 0.3s;
            }

            .product:hover .precios-oferta{
                background-color: rgb(0, 0, 0);
                color: white;
                transition: 0.2s;
                border-bottom-right-radius: 20px;
                border-bottom-left-radius: 20px;
            }

            .price-tachado{
                margin: 0;
            }

            .price-oferta{
                background-color: black;
                border-radius: 4px;
                color: white;
                margin: 0;
                padding-inline: 8px;
            }

            .product:hover .price-oferta{
                background-color: white;
                color: black;
                border-bottom-right-radius: 20px;
                transition: .2s;
            }

            .descuento{
                color: rgb(255, 198, 93);
                margin: 0;
                
            }

            span.inner {
                vertical-align: middle;
                color: black;
                margin: 0;
                font-size: 13px;
            }

            .product:hover span.inner{
                color: white;
            }

            span.outer {
                margin: 0;
                color: red;
                text-decoration: line-through;
            }
            /* FIN PRODUCTO EN OFERTA */
        
        /* FIN PRODUCT LIST */

        .load_more_products{                      
            }
            .load_more_products a{
                background-color: rgb(255, 255, 255);
                border: 2px solid;
                border-color: rgb(119, 119, 119);
                border-radius: 4px;
                color: rgb(65, 65, 65);
                display: block;
                font-size: 18px;
                font-weight: bolder;
                margin-left: 37.3%;   
                padding: 10px;         
                text-align: center;
                text-decoration: none;
                transition: 0.3s;
                width: 25%;                  
                }
                .load_more_products a:hover{
                    background-color: rgb(65, 65, 65);
                    border-color: white;
                    box-shadow: -0px 3px 5px 1px rgb(90, 90, 90);
                    color: white;
                    transition: 0.2s;
        }

        .favorite_active{
            background-color: red !important;
            color: white !important;
        }

        .favorite_active:hover{
            background-color: rgb(255, 146, 146) !important;
            color: white !important;
        }

        hr{
            margin: 0vw 5vw;
            padding: 0.05vw;
        }

        .h2-prods{
            margin-top: 2vw;
            letter-spacing: 1vw;
            font-weight: bolder;
        }



        /* cambios responsivos  */

        @media (max-width: 768px) {

            span.outer {
                visibility: hidden;
                position: absolute;
            }

            .tienda_action_bar form{
                margin-top: 1vw;
            }

            .load_more_products a{
                margin: 0px;
                width: 100%;
            }

            /* PRODUCTO NORMAL */
            .products_list .product .image .overlay .btns a{  
                background-color: rgba(255, 255, 255, 1);
                border-radius: 4px;
                margin-bottom: 3px;
                padding: 1vw;
                font-size: 3.5vw;  
                display: block;
                float: left;
                text-align: center;      
                width: 100%;                      
                color: black;
            }

            .products_list .product .image .overlay .btns{
                background-color: rgba(0, 0, 0, 0.8);
                border-bottom-right-radius: 4px;
                display: inline-block;
                margin: 1px;
                padding: 2vw;
                transition: 0.2s;
            }

            .products_list{
                /* product list */
                }
                .products_list .product{
                    margin-right: 2%;
                    width: 49% !important;
                    }
                    .products_list .product:nth-child(even){
                        margin-right: 0px;
                    }
                    .products_list .product:nth-child(5n){
                        margin-right: 2%;
                    }
            }
        }
    </style>
  </head>

<header>
    @include('partials.navbar')
</header>

  <body>

    @php
        $categorias = [
            'Cuadros',
            'Poleras',
            'Sprays',
        ];
        $i = 0;
    @endphp

    @include('partials.preloader')
    <section>
        <div class="container-fluid container-search">
            <div class="tienda_action_bar shadow">
                <div class="row">
                    <div class="col-md-3">
                        <div class="categorias">
                            <a href=""><i class="fas fa-stream"></i>Categorías</a>
                            <ul class="shadow">
                                @foreach ($categorias as $cat)
                                    @php
                                        $cat_min = strtolower($cat);
                                    @endphp
                                    <li><a href="{{ url('/tienda/'.$cat_min) }}">{{ $cat }}</a></li>
                                @endforeach
                            </ul>
                        </div>                    
                    </div>  
                    
                    <div class="col-md-9">
                        <form class="needs-validation" action="/search" method="POST" novalidate>
                        @csrf
                            <div class="input-group">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control" id="search_query" name="search_query" placeholder="¿Buscas algo?" required>
                                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                                <div class="invalid-feedback">Debe ingresar el NOMBRE a buscar.</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid container-slider mt-3">
            @include('tienda.slider_tienda')
        </div>
    </section>

    <section>
        <h2 class="text-center h2-prods" >PRODUCTOS</h2>
        <hr>
        <div class="container-fluid container-pl">
            <div class="products_list" id="products_list"></div>
            <div class="load_more_products">
                <a href="#" id="load_more_products">Ver más productos</a>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    
  </body>

  <footer>
    @include('partials.footer')
   </footer>
</html>

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
