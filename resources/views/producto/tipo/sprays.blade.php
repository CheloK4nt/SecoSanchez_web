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
                        <li><a style="text-transform: capitalize" href="{{ route('tienda.poleras') }}"><i class="fas fa-tshirt"></i>{{ $producto->cat_prod }}s</a></li>
                    @endif 
                    @if ($producto->cat_prod == "cuadro")
                        <li><a style="text-transform: capitalize" href="{{ route('tienda.cuadros') }}"><i class="fas fa-image"></i>{{ $producto->cat_prod }}s</a></li>
                    @endif
                    @if ($producto->cat_prod == "spray")
                        <li><a style="text-transform: capitalize" href="{{ route('tienda.sprays') }}"><i class="fas fa-spray-can"></i>{{ $producto->cat_prod }}s</a></li>
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