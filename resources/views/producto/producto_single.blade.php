@extends('master')
<title>{{$producto->id_prod}} - {{$producto->nom_prod}}</title>

<style>

    .product_single .container-prod{
        background-color: rgb(245, 245, 245);
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
            background-color: rgb(150, 150, 150);
            border-radius: 4px;
            color: white;
            padding: 4px;
        }
    /* FIN PRODUCT SINGLE XL */

    .slick-arrow{
        
    }

    .slick-prev:before{
        color: white !important;
        padding-left: 2px !important;
    }

    .slick-next:before{
        color: white !important;
        margin-left: -5px !important;
    }

    
</style>

@section('content')
<div class="product_single">
    <div class="container container-prod">
        @php
            $idp = $producto->id_prod;
            $idp = substr($idp,0,3);
        @endphp
        @if ($idp == "PRO")
            <div class="row">
                {{-- galeria producto --}}
                <div class="col-md-4">
                    <div class="slider-for">
                        <div>
                            <img src="{{ url('/uploads/productos/'.$producto->file_path.'/'.$producto->img_prod) }}" class="img-fluid img-slick" id="imagen1" style="background-color: white">
                        </div>
                        @foreach ($producto->getGaleria as $galeria)
                        <div>
                            <img src="{{ url('/uploads/productos/'.$galeria->file_path.'/'.$galeria->file_name) }}" class="img-fluid img-slick" id="imagenes" style="background-color: white">
                        </div>                    
                        @endforeach  
                    </div> 
                </div>

                <div class="col-md-8">
                    <h2 class="title text-center">{{$producto->nom_prod}} - @if ($producto->categoria != null) {{$producto->categoria->nom_cat}} @else Sin categoría @endif </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mt-2">
                    @if(count($producto->getGaleria) > 0)     
                    <div class="container cf-nav">
                        <div class="slider-nav">
                            <div class="img-nav">
                                <img src="{{ url('/uploads/productos/'.$producto->file_path.'/mt_'.$producto->img_prod) }}" class="img-fluid img-nav-border" style="width:100px">
                            </div>
                            @foreach ($producto->getGaleria as $galeria)
                                <div class="img-nav">
                                    <img src="{{ url('/uploads/productos/'.$galeria->file_path.'/mt_'.$galeria->file_name) }}" class="img-fluid img-nav-border" style="width:100px">
                                </div>                    
                            @endforeach                               
                        </div>   
                    </div>   
                @endif
                </div>            
            </div>  
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
@endsection
