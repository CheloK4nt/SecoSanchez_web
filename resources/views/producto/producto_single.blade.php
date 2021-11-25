@extends('master')
<title>{{$producto->id_prod}} - {{$producto->nom_prod}}</title>

<style>

    body{
        margin-top: 20px !important;
    }

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
            transition: 0.1s;
        }

        .img-nav:hover .img-nav-border{
            border: 3px solid;
            border-color: rgb(255, 174, 0) !important;
            transition: 0.15s;
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
        @include('producto.tipo.poleras')
        @include('producto.tipo.cuadros')  
        @include('producto.tipo.sprays')
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
