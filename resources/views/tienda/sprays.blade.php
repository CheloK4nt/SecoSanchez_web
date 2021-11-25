@extends('master')
@include('tienda.estilos.css_categorias')

<title>Tienda - Sprays</title>

<style>
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
    <div class="container-fluid ct mt-4" style="padding: 50px;">
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
                    <h2 class="text-center h2-prods">SPRAYS</h2>
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