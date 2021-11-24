@extends('master')

<title>Tienda - Cuadros</title>

<style>

    body{
        background: rgb(230, 230, 230) !important;
    }

    .ct .categories_list{
        background-color: gray;
        border-radius: 10px;
        padding: 0px;
    }

    .ct .categories_list h2.title{
        background-color:  black;
        border-radius: 10px 10px 0 0;
        color: white;
        display: block;
        font-weight: lighter;
        letter-spacing: 4px;
        margin: 0;
        padding: 10px 10px 10px 10px;
        text-align: start;
    }

    .ct .categories_list h2.title i{
        padding: 10px;
    }

    .ct .categories_list ul{
        list-style: none;
        margin: 0px;
        padding: 0px;
    }

    .ct .categories_list li:hover{
        background-color: rgb(58, 58, 58);
        transition: .2s;
    }

    .ct .categories_list ul li:last-child{
        border-radius: 0px 0px 8px 8px;
        border: 0px;
    }

    .ct .categories_list li{
        border-bottom: 1px solid rgb(182, 182, 182);
        padding: 0px;
        margin: 0px;
    }

    .ct .categories_list li a{
        color: white;
        font-size: 24px;
        font-weight: lighter;
        display: block;
        padding: 10px;
        padding-inline: 40px;
        text-decoration: none;
        width: 100%;
    }

    .polera{
        font-size: 19px;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
    }

    .ct .categories_list li a i{
        color: ;
        padding: 10px;
    }

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

    .favorite_active{
            background-color: red !important;
            color: white !important;
    }

    .favorite_active:hover{
        background-color: rgb(255, 146, 146) !important;
        color: white !important;
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

@php
    $categorias = [
        'Cuadros',
        'Poleras',
        'Sprays',
    ];
    $iconos = [
        'far fa-image',
        'fas fa-tshirt polera',
        'fas fa-spray-can',       
    ];
    $i = 0;
@endphp

@section('content')
    <div class="container-fluid ct" style="padding: 50px;">
        <div class="row">
            <div class="col-md-3" style="padding: 0px;">
                <div class="categories_list shadow">
                    <h2 class="title"><i class="fas fa-stream"></i>CATEGORÍAS</h2>
                    <ul>
                        @foreach ($categorias as $cat)
                            @php
                                $cat_min = strtolower($cat);
                                $icono_1 = substr($iconos[$i], 0, 3);
                                $icono_2 = substr($iconos[$i], 4);
                                $i = $i + 1; 
                            @endphp
                            <li><a href="{{ url('/tienda/'.$cat_min) }}"><i @if ($cat=="poleras") style="font-size: 20px !important;" @endif class="{{$icono_1}} {{$icono_2}}"></i>{{ $cat }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <section>
                    <h2 class="text-center h2-prods">PRODUCTOS</h2>
                    <hr>
                    <div class="container-fluid container-pl">
                        <div class="products_list" id="products_list">

                        </div>
                        <div class="load_more_products">
                            <a href="#" id="load_more_products">Ver más productos</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection