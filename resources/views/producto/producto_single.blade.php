@extends('master')
<title>{{$producto->id_prod}} - {{$producto->nom_prod}}</title>

<style>

    .product_single .container-prod{
        background-color: rgb(241, 241, 241);
        margin-top: 32px;
        padding: 10px;
        }

        .img-slick{
            border: 4px solid;
            border-color: rgb(0, 0, 0);
        }

        .cf-nav{
            background-color: rgb(0, 0, 0);
            text-align: center;
            width: 20%;
        }

        .slider-nav{
            /* background-color: red; */
            height: 75%;
        }

        .img-nav{
            padding: 10px;
        }

        .img-nav-border{
            border: 3px solid;
            border-color: white;
        }

        .title{
            background-color: rgb(85, 85, 85);
            font-weight: 10;
            letter-spacing: 0.4vw;
            border-radius: 4px;
            color: white;
            padding: 4px;
        }

        .categoria{
           /* categoria  */
            }
            .categoria ul{
                background: white;
                border-radius: 4px;
                list-style: none;
                margin: 0px;
                overflow: hidden;
                padding: 0px;
                }
                .categoria ul li{
                    display: inline-flex;
                    margin: 0px 6px;
                    float: left;
                    }
                    .categoria ul li .next{
                        display: block;
                        color: rgb(0, 0, 0);s
                        font-size: 0.8vw;
                        position: relative;
                        margin-top: 0.2vw;
                    }
                    .categoria ul li a{
                        color: rgb(110, 110, 110);
                        display: inline-block;
                        text-decoration: none;
                        }
                        .categoria ul li a:hover{
                        color: rgb(0, 0, 0);
                        }
                        .categoria ul li a i{
                            padding: 0px 10px;
                        }


    /* FIN PRODUCT SINGLE XL */

    .slick-prev:before{
        color: white !important;
        padding-left: 2px !important;
    }

    .slick-next:before{
        color: white !important;
        margin-left: -5px !important;
    }

    .col-inferior{
        visibility: visible;
    }

    .container-precio{
        border-radius: 4px;
        margin-top: 1vw;
        vertical-align: middle;
        background: white;
        padding: 10px;
        display: inline-flex;
        font-size: 1.2em;
        width: 100%;
        }
        .container-precio p{
            margin: 0;
    }

    .container-descripcion{
        border-radius: 4px;
        margin-top: 1vw;
        vertical-align: middle;
        background: white;
        padding: 10px;
        display: inline-flex;
        font-size: 1.2em;
        width: 100%;
        }
        .container-descripcion p{
            margin: 0;
    }

    .container-tallas{
        border-radius: 4px;
        margin-top: 1vw;
        background: rgb(255, 255, 255);
        font-size: 1.2em;
        padding: 10px;
        }
        .container-tallas .radio.col-up {
            display: inline-flex;
            flex-direction: column-reverse;
            align-items: center;
            padding: 0px 10px;
        }

        input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: black;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    .container-medidas{
        display: inline-flex;
    }
    .container-botones{
        border-radius: 4px;
        vertical-align: middle;
        background: white;
        padding: 10px;
        display: inline-flex;
        font-size: 1.2em;
        width: 100%;
        }
        .container-precio p{
            margin: 0;
    }

    .btn-cart{
        background: rgb(0, 0, 0) !important;
        border: 2px solid !important;
        border-color: rgb(0, 0, 0) !important;
        border-radius: 4px;
        color: white !important;
        /* width: 100%; */
    }

    .btn-cart:hover{
        background: rgb(145, 145, 145) !important;
    }

    .favorite_active{
        background: rgb(255, 0, 0) !important;
        border: 2px solid !important;
        border-color: black !important;
        border-radius: 4px !important;
        color: rgb(255, 255, 255) !important;
        font-size: 22px !important;
    }

    .favorite_active:hover{
        background: rgb(252, 156, 156) !important;
    }

    .btn-heart{
        background: rgb(0, 0, 0) !important;
        border: 2px solid !important;
        border-color: rgb(0, 0, 0) !important;
        border-radius: 4px !important;
        color: rgb(255, 255, 255) !important;
        font-size: 22px !important;
    }

    .btn-heart:hover{
        background: rgb(145, 145, 145) !important;
        transition: 0.2s !important;
    }

    .col-stock{
        display: inline-flex;
        text-align: center;
    }

    .i-info{
        color: rgb(255, 153, 0);
        font-size: 16px;
        margin-top: 8;
        margin-left: 9;
        }
        .i-info:hover{
            color: gray;
    }

    .p-dscto{
        color: rgb(255, 153, 0);
        font-weight: bolder;
        font-size: 30px;
    }

    .p-oferta{
        background: black;
        border-radius: 7px;
        color: rgb(255, 255, 255);
        font-size: 30px;
        font-weight: bolder;
        padding: 0px 8px;
    }

    span{
        margin: 0;
    }

    span.inner {
        vertical-align: middle;
        color: black;
        margin: 0;
    }
    span.outer {
        margin: 0;
        color: red;
        text-decoration: line-through;
    }

    @media (max-width: 768px) {
        .col_inferior{
            visibility: hidden;
        }

        .title{
            border-radius: 0px;
        }
    }

    
</style>

@section('content')
<div class="product_single vista_xl">
    <div class="container container-prod">
        {{-- POLERAS --}}
        @if ($producto->cat_prod == "polera")
            <form action="{{ url('/cart/polera/add') }}" method="POST">
                <div class="row">
                    {{-- galeria producto --}}
                    <div class="col-md-4">
                        <div class="slider-for">
                            <div>
                                <img src="{{ url('/uploads/productos/poleras/'.$producto->file_path.'/'.$producto->img_prod) }}" class="img-fluid img-slick" id="imagen1" style="background-color: white">
                            </div>
                            @foreach ($producto->getGaleria as $galeria)
                            <div>
                                <img src="{{ url('/uploads/productos/poleras/'.$galeria->file_path.'/'.$galeria->file_name) }}" class="img-fluid img-slick" id="imagenes" style="background-color: white">
                            </div>                    
                            @endforeach  
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h2 class="title text-center">{{$producto->nom_prod}}</h2>
                        <div class="categoria">
                            <ul>
                                <li><a href="{{ route('inicio') }}"><i class="fas fa-home"></i>Inicio</a></li>
                                <li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
                                <li><a href="{{ route('tienda') }}"><i class="fas fa-store"></i>Tienda</a></li>
                                <li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
                                @if ($producto->cat_prod == "polera")
                                    <li><a style="text-transform: capitalize" href="#"><i class="fas fa-tshirt"></i>{{ $producto->cat_prod }}</a></li>
                                @endif 
                                @if ($producto->cat_prod == "cuadro")
                                    <li><a style="text-transform: capitalize" href="#"><i class="fas fa-image"></i>{{ $producto->cat_prod }}</a></li>
                                @endif
                                @if ($producto->cat_prod == "spray")
                                    <li><a style="text-transform: capitalize" href="#"><i class="fas fa-spray-can"></i>{{ $producto->cat_prod }}</a></li>
                                @endif                           
                                <li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
                                <li><a href="{{ url('/product/'.$producto->id_prod) }}"><i class="fas fa-tag"></i>{{ $producto->id_prod }}</a></li>
                            </ul>
                        </div>

                        @if ($producto->en_dcto_prod == "si")
                        {{-- CON DESCUENTO --}}
                        <div class="container-precio d-flex justify-content-between">            
                            <div class="precio mt-2" style="display: inline-flex">
                                <p style="font-weight: bolder; margin-right: 10px;">Precio:</p>
                                @php
                                    $precio = $producto->precio_prod;
                                    $precio = number_format($precio, 0, ',', '.');
                                @endphp
                                <span class="outer">
                                    <span class="inner">${{$precio}}</span>
                                </span>
                            </div>                           
                            <p class="p-dscto" >{{$producto->dcto_prod}}%DCTO.</p>
                            @php
                                $porcentaje = $producto->dcto_prod;
                                $descuento = $producto->precio_prod/$porcentaje;
                                $precio_oferta = $producto->precio_prod - $descuento;
                                $precio_oferta = number_format($precio_oferta, 0, ',', '.');
                                // $precio_ofert = calc($precio - ())
                            @endphp
                            <p class="p-oferta" >${{$precio_oferta}}</p>
                        </div>
                        @else
                        {{-- SIN DESCUENTO --}}
                        <div class="container-precio">            
                            <div class="precio" style="display: inline-flex">
                                <p style="font-weight: bolder; margin-right: 10px;">Precio:</p>
                                @php
                                    $precio = $producto->precio_prod;
                                    $precio = number_format($precio, 0, ',', '.');
                                @endphp
                                <p>${{$precio}}</p>
                            </div>                           
                        </div>
                        @endif  
                            
                            
                        
                        
                        <div class="container-descripcion">
                            <p style="font-weight: bolder; margin-right: 10px;">Descripción:</p>
                            <p>{{$producto->descr_prod}}.</p>
                        </div>

                        <div class="container-tallas">
                            <div class="row">
                                <div class="col">
                                    <p style="font-weight: bolder; margin-right: 3px;">Seleccionar talla:</p>
                                </div>
                                <div class="col text-center">
                                    <div class="col-stock">
                                        <p style="font-weight: bolder; margin-right: 3px;">Stock:</p>
                                        @if ($producto->stock_prod <= $producto->crit_prod)
                                            <p style="color:red" >{{ $producto->stock_prod }}</p>
                                            <p><i class="fas fa-info-circle i-info" data-toggle="tooltip" data-placement="top" title="¡Poco Stock!"></i></p>
                                        @else
                                            <p>{{ $producto->stock_prod }}</p>
                                        @endif                                  
                                    </div>                                
                                </div>
                            </div>
                            
                            <select class="form-select" id="talla-polera" style="width: 20%" aria-label="Default select example">
                                <option value="s" @if ($polera->s == 0) disabled style="color:grey" @endif>S</option>
                                <option value="m" @if ($polera->m == 0) disabled style="color:grey" @endif>M</option>
                                <option value="l" @if ($polera->l == 0) disabled style="color:grey" @endif>L</option>
                                <option value="xl" @if ($polera->xl == 0) disabled style="color:grey" @endif>XL</option>
                                <option value="xxl" @if ($polera->xxl == 0) disabled style="color:grey" @endif>XXL</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-2">
                        @if(count($producto->getGaleria) > 0)     
                        <div class="container cf-nav">
                            <div class="slider-nav">
                                <div class="img-nav">
                                    <img src="{{ url('/uploads/productos/poleras/'.$producto->file_path.'/mt_'.$producto->img_prod) }}" class="img-fluid img-nav-border" style="width:100px">
                                </div>
                                @foreach ($producto->getGaleria as $galeria)
                                    <div class="img-nav">
                                        <img src="{{ url('/uploads/productos/poleras/'.$galeria->file_path.'/mt_'.$galeria->file_name) }}" class="img-fluid img-nav-border" style="width:100px">
                                    </div>                    
                                @endforeach                               
                            </div>   
                        </div>   
                        @endif
                    </div>

                    <div class="col-md-8">
                        <div class="row" style="padding-inline: 11px">
                            <div class="container-botones d-flex justify-content-between">
                                <div class="col-md-4">
                                    @if (Auth::user())
                                        @if ($favorito == "[]")
                                            <a class="btn btn-heart" id="favorito_{{ $producto->id_prod }}" href="" onclick="agregar_a_favoritos_ps('{{ $producto->id_prod }}'); return false"><i class="fas fa-heart"></i></a>
                                        @else
                                        <a class="btn favorite_active" id="favorito_{{ $producto->id_prod }}" href="" onclick="eliminar_favorito_ps('{{ $producto->id_prod }}'); return false"><i class="fas fa-heart"></i></a>
                                        @endif
                                    @else
                                        <a class="btn btn-heart" href="" onclick="Swal.fire({title:':(', text:'¡Debes iniciar sesión para agregar productos a tus favoritos!', icon:'warning'}); return false"><i class="fas fa-heart"></i></a>
                                    @endif
                                </div>
                                <div class="col-md-4 text-end">
                                    @if (Auth::user())
                                        <button type="submit" class="btn btn-cart"><i class="fas fa-cart-plus" style="margin-right: 8px"></i>Agregar al carrito</button>
                                    @else
                                    <button class="btn btn-cart" onclick="Swal.fire({title:':(', text:'¡Debes iniciar sesión para agregar productos a tu carrito de compras!', icon:'warning'}); return false"><i class="fas fa-cart-plus" style="margin-right: 8px"></i>Agregar al carrito</button>
                                    @endif                
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </form>  
        @endif
        
        {{-- CUADROS --}}
        @if ($producto->cat_prod == "cuadro")
            <form action="{{ url('/cart/cuadro/add') }}" method="POST">
                <div class="row">
                    {{-- galeria producto --}}
                    <div class="col-md-4">
                        <div class="slider-for">
                            <div>
                                <img src="{{ url('/uploads/productos/cuadros/'.$producto->file_path.'/'.$producto->img_prod) }}" class="img-fluid img-slick" id="imagen1" style="background-color: white">
                            </div>
                            @foreach ($producto->getGaleria as $galeria)
                            <div>
                                <img src="{{ url('/uploads/productos/cuadros/'.$galeria->file_path.'/'.$galeria->file_name) }}" class="img-fluid img-slick" id="imagenes" style="background-color: white">
                            </div>                    
                            @endforeach  
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h2 class="title text-center">{{$producto->nom_prod}}</h2>
                        <div class="categoria">
                            <ul>
                                <li><a href="{{ route('inicio') }}"><i class="fas fa-home"></i>Inicio</a></li>
                                <li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
                                <li><a href="{{ route('tienda') }}"><i class="fas fa-store"></i>Tienda</a></li>
                                <li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
                                @if ($producto->cat_prod == "polera")
                                    <li><a style="text-transform: capitalize" href="#"><i class="fas fa-tshirt"></i>{{ $producto->cat_prod }}</a></li>
                                @endif 
                                @if ($producto->cat_prod == "cuadro")
                                    <li><a style="text-transform: capitalize" href="#"><i class="fas fa-image"></i>{{ $producto->cat_prod }}</a></li>
                                @endif
                                @if ($producto->cat_prod == "spray")
                                    <li><a style="text-transform: capitalize" href="#"><i class="fas fa-spray-can"></i>{{ $producto->cat_prod }}</a></li>
                                @endif                           
                                <li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
                                <li><a href="{{ url('/product/'.$producto->id_prod) }}"><i class="fas fa-tag"></i>{{ $producto->id_prod }}</a></li>
                            </ul>
                        </div>

                        @if ($producto->en_dcto_prod == "si")
                        {{-- CON DESCUENTO --}}
                        <div class="container-precio d-flex justify-content-between">            
                            <div class="precio mt-2" style="display: inline-flex">
                                <p style="font-weight: bolder; margin-right: 10px;">Precio:</p>
                                @php
                                    $precio = $producto->precio_prod;
                                    $precio = number_format($precio, 0, ',', '.');
                                @endphp
                                <span class="outer">
                                    <span class="inner">${{$precio}}</span>
                                </span>
                            </div>                           
                            <p class="p-dscto" >{{$producto->dcto_prod}}%DCTO.</p>
                            @php
                                $porcentaje = $producto->dcto_prod;
                                $descuento = $producto->precio_prod/$porcentaje;
                                $precio_oferta = $producto->precio_prod - $descuento;
                                $precio_oferta = number_format($precio_oferta, 0, ',', '.');
                                // $precio_ofert = calc($precio - ())
                            @endphp
                            <p class="p-oferta" >${{$precio_oferta}}</p>
                        </div>
                        @else
                        {{-- SIN DESCUENTO --}}
                        <div class="container-precio">            
                            <div class="precio" style="display: inline-flex">
                                <p style="font-weight: bolder; margin-right: 10px;">Precio:</p>
                                @php
                                    $precio = $producto->precio_prod;
                                    $precio = number_format($precio, 0, ',', '.');
                                @endphp
                                <p>${{$precio}}</p>
                            </div>                           
                        </div>
                        @endif  
                            
                            
                        
                        
                        <div class="container-descripcion">
                            <p style="font-weight: bolder; margin-right: 10px;">Descripción:</p>
                            <p>{{$producto->descr_prod}}.</p>
                        </div>

                        <div class="container-tallas">
                            <div class="row">
                                <div class="col">
                                    <p style="font-weight: bolder; margin-right: 3px;">Medidas:</p>
                                </div>
                                <div class="col text-center">
                                    <div class="col-stock">
                                        <p style="font-weight: bolder; margin-right: 3px;">Stock:</p>
                                        @if ($producto->stock_prod <= $producto->crit_prod)
                                            <p style="color:red" >{{ $producto->stock_prod }}</p>
                                            <p><i class="fas fa-info-circle i-info" data-toggle="tooltip" data-placement="top" title="¡Poco Stock!"></i></p>
                                        @else
                                            <p>{{ $producto->stock_prod }}</p>
                                        @endif                                  
                                    </div>                                
                                </div>
                            </div>
                            

                            <div class="container container-medidas">
                                <p>{{ $cuadro->alto }}cm. alto <i class="fas fa-ruler-vertical"></i></p>
                                <p style="margin-inline: 4px; font-weight: bolder; color: rgb(255, 153, 0)">x</p>
                                <p>{{ $cuadro->ancho }}cm. ancho <i class="fas fa-ruler-horizontal"></i></p>
                                <p style="margin-inline: 4px; font-weight: bolder; color: rgb(255, 153, 0)">x</p>
                                <p>{{ $cuadro->largo }}cm. largo(profundidad) <i class="fas fa-ruler"></i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-2">
                        @if(count($producto->getGaleria) > 0)     
                        <div class="container cf-nav">
                            <div class="slider-nav">
                                <div class="img-nav">
                                    <img src="{{ url('/uploads/productos/cuadros/'.$producto->file_path.'/mt_'.$producto->img_prod) }}" class="img-fluid img-nav-border" style="width:100px">
                                </div>
                                @foreach ($producto->getGaleria as $galeria)
                                    <div class="img-nav">
                                        <img src="{{ url('/uploads/productos/cuadros/'.$galeria->file_path.'/mt_'.$galeria->file_name) }}" class="img-fluid img-nav-border" style="width:100px">
                                    </div>                    
                                @endforeach                               
                            </div>   
                        </div>   
                        @endif
                    </div>

                    <div class="col-md-8">
                        <div class="row" style="padding-inline: 11px">
                            <div class="container-botones d-flex justify-content-between">
                                <div class="col-md-4">
                                    @if (Auth::user())
                                        @if ($favorito == "[]")
                                            <a class="btn btn-heart" id="favorito_{{ $producto->id_prod }}" href="" onclick="agregar_a_favoritos_ps('{{ $producto->id_prod }}'); return false"><i class="fas fa-heart"></i></a>
                                        @else
                                            <a class="btn favorite_active" id="favorito_{{ $producto->id_prod }}" href="" onclick="eliminar_favorito_ps('{{ $producto->id_prod }}'); return false"><i class="fas fa-heart"></i></a>
                                        @endif
                                    @else
                                        <a class="btn btn-heart" href="" onclick="Swal.fire({title:':(', text:'¡Debes iniciar sesión para agregar productos a tus favoritos!', icon:'warning'}); return false"><i class="fas fa-heart"></i></a>
                                    @endif
                                </div>
                                <div class="col-md-4 text-end">
                                    @if (Auth::user())
                                        <button type="submit" class="btn btn-cart"><i class="fas fa-cart-plus" style="margin-right: 8px"></i>Agregar al carrito</button>
                                    @else
                                    <button class="btn btn-cart" onclick="Swal.fire({title:':(', text:'¡Debes iniciar sesión para agregar productos a tu carrito de compras!', icon:'warning'}); return false"><i class="fas fa-cart-plus" style="margin-right: 8px"></i>Agregar al carrito</button>
                                    @endif  
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </form>  
        @endif  

        {{-- SPRAYS --}}
        @if ($producto->cat_prod == "spray")
            <form action="{{ url('/cart/spray/add') }}" method="POST">
                <div class="row">
                    {{-- galeria producto --}}
                    <div class="col-md-4">
                        <div class="slider-for">
                            <div>
                                <img src="{{ url('/uploads/productos/sprays/'.$producto->file_path.'/'.$producto->img_prod) }}" class="img-fluid img-slick" id="imagen1" style="background-color: white">
                            </div>
                            @foreach ($producto->getGaleria as $galeria)
                            <div>
                                <img src="{{ url('/uploads/productos/sprays/'.$galeria->file_path.'/'.$galeria->file_name) }}" class="img-fluid img-slick" id="imagenes" style="background-color: white">
                            </div>                    
                            @endforeach  
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h2 class="title text-center">{{$producto->nom_prod}}</h2>
                        <div class="categoria">
                            <ul>
                                <li><a href="{{ route('inicio') }}"><i class="fas fa-home"></i>Inicio</a></li>
                                <li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
                                <li><a href="{{ route('tienda') }}"><i class="fas fa-store"></i>Tienda</a></li>
                                <li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
                                @if ($producto->cat_prod == "polera")
                                    <li><a style="text-transform: capitalize" href="#"><i class="fas fa-tshirt"></i>{{ $producto->cat_prod }}</a></li>
                                @endif 
                                @if ($producto->cat_prod == "cuadro")
                                    <li><a style="text-transform: capitalize" href="#"><i class="fas fa-image"></i>{{ $producto->cat_prod }}</a></li>
                                @endif
                                @if ($producto->cat_prod == "spray")
                                    <li><a style="text-transform: capitalize" href="#"><i class="fas fa-spray-can"></i>{{ $producto->cat_prod }}</a></li>
                                @endif                           
                                <li><span class="next"><i class="fas fa-chevron-right"></i></span></li>
                                <li><a href="{{ url('/product/'.$producto->id_prod) }}"><i class="fas fa-tag"></i>{{ $producto->id_prod }}</a></li>
                            </ul>
                        </div>

                        @if ($producto->en_dcto_prod == "si")
                        {{-- CON DESCUENTO --}}
                        <div class="container-precio d-flex justify-content-between">            
                            <div class="precio mt-2" style="display: inline-flex">
                                <p style="font-weight: bolder; margin-right: 10px;">Precio:</p>
                                @php
                                    $precio = $producto->precio_prod;
                                    $precio = number_format($precio, 0, ',', '.');
                                @endphp
                                <span class="outer">
                                    <span class="inner">${{$precio}}</span>
                                </span>
                            </div>                           
                            <p class="p-dscto" >{{$producto->dcto_prod}}%DCTO.</p>
                            @php
                                $porcentaje = $producto->dcto_prod;
                                $descuento = $producto->precio_prod/$porcentaje;
                                $precio_oferta = $producto->precio_prod - $descuento;
                                $precio_oferta = number_format($precio_oferta, 0, ',', '.');
                                // $precio_ofert = calc($precio - ())
                            @endphp
                            <p class="p-oferta" >${{$precio_oferta}}</p>
                        </div>
                        @else
                        {{-- SIN DESCUENTO --}}
                        <div class="container-precio">            
                            <div class="precio" style="display: inline-flex">
                                <p style="font-weight: bolder; margin-right: 10px;">Precio:</p>
                                @php
                                    $precio = $producto->precio_prod;
                                    $precio = number_format($precio, 0, ',', '.');
                                @endphp
                                <p>${{$precio}}</p>
                            </div>                           
                        </div>
                        @endif  
                            
                            
                        
                        
                        <div class="container-descripcion">
                            <p style="font-weight: bolder; margin-right: 10px;">Descripción:</p>
                            <p>{{$producto->descr_prod}}.</p>
                        </div>

                        <div class="container-tallas">
                            <div class="row">
                                <div class="col" style="display: inline-flex">
                                    <p style="font-weight: bolder; margin-right: 3px;">Cantidad:</p>
                                    <p>{{ $spray->cantidad }}ml.</p>
                                </div>
                                <div class="col" style="display: inline-flex">
                                    <p style="font-weight: bolder; margin-right: 3px;">Color:</p>
                                    <p>{{ $spray->color }}</p>
                                </div>
                                <div class="col text-center">
                                    <div class="col-stock">
                                        <p style="font-weight: bolder; margin-right: 3px;">Stock:</p>
                                        @if ($producto->stock_prod <= $producto->crit_prod)
                                            <p style="color:red" >{{ $producto->stock_prod }}</p>
                                            <p><i class="fas fa-info-circle i-info" data-toggle="tooltip" data-placement="top" title="¡Poco Stock!"></i></p>
                                        @else
                                            <p>{{ $producto->stock_prod }}</p>
                                        @endif                                  
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-2">
                        @if(count($producto->getGaleria) > 0)     
                        <div class="container cf-nav">
                            <div class="slider-nav">
                                <div class="img-nav">
                                    <img src="{{ url('/uploads/productos/sprays/'.$producto->file_path.'/mt_'.$producto->img_prod) }}" class="img-fluid img-nav-border" style="width:100px">
                                </div>
                                @foreach ($producto->getGaleria as $galeria)
                                    <div class="img-nav">
                                        <img src="{{ url('/uploads/productos/sprays/'.$galeria->file_path.'/mt_'.$galeria->file_name) }}" class="img-fluid img-nav-border" style="width:100px">
                                    </div>                    
                                @endforeach                               
                            </div>   
                        </div>   
                        @endif
                    </div>

                    <div class="col-md-8">
                        <div class="row" style="padding-inline: 11px">
                            <div class="container-botones d-flex justify-content-between">
                                <div class="col-md-4">
                                    @if (Auth::user())
                                        @if ($favorito == "[]")
                                            <a class="btn btn-heart" id="favorito_{{ $producto->id_prod }}" href="" onclick="agregar_a_favoritos_ps('{{ $producto->id_prod }}'); return false"><i class="fas fa-heart"></i></a>
                                        @else
                                        <a class="btn favorite_active" id="favorito_{{ $producto->id_prod }}" href="" onclick="eliminar_favorito_ps('{{ $producto->id_prod }}'); return false"><i class="fas fa-heart"></i></a>
                                        @endif
                                    @else
                                        <a class="btn btn-heart" href="" onclick="Swal.fire({title:':(', text:'¡Debes iniciar sesión para agregar productos a tus favoritos!', icon:'warning'}); return false"><i class="fas fa-heart"></i></a>
                                    @endif
                                </div>
                                <div class="col-md-4 text-end">
                                    @if (Auth::user())
                                        <button type="submit" class="btn btn-cart"><i class="fas fa-cart-plus" style="margin-right: 8px"></i>Agregar al carrito</button>
                                    @else
                                        <button class="btn btn-cart" onclick="Swal.fire({title:':(', text:'¡Debes iniciar sesión para agregar productos a tu carrito de compras!', icon:'warning'}); return false"><i class="fas fa-cart-plus" style="margin-right: 8px"></i>Agregar al carrito</button>
                                    @endif  
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </form>  
        @endif  
    </div>
</div>

<script>
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        // fade: true,
        draggable: true,
        asNavFor: '.slider-nav',
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        arrows: true,
        centerMode: true,
        autoplay: true,
        focusOnSelect: true,
    });
</script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

<script>
    function addCommas(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }
</script>

@endsection
