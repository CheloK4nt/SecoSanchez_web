
@extends('admin.master')

@section('title', "$prod->id_prod - Editar")

<style>
    .panel{
        background-color: rgb(133, 133, 133);
        border-radius: 5px;
        border-bottom: 5px solid rgb(170, 170, 170);
        width: 100%;
    }

    .panel .header{
        border-bottom: 1px solid rgb(168, 168, 168);
    }

    h2.title{
        display: inline-block;
        color: white;
        font-size: 1.1em;
        padding: 12px;
    }

    .logo-addprod{
        padding: 5px;
    }

    .inside{
        padding: 16px;
    }

    .btn-info{
        background-color: rgba(0, 0, 0, 0.815) !important;
        border-color: rgb(70, 70, 70) !important;
        border-width: 3px !important;
    }

    .btn-info i{
        color: white;
    }

    .btn-info:hover{
        background-color: rgba(255, 0, 0, 0.658) !important;
        border-width: 3px;
        border-color: rgb(99, 0, 0) !important;
    }

    .form-id-prod{
        margin-top: 10px;
        font-family: 'consolas';
        padding: 3px !important;
        padding-inline: 5px !important;
        background-color: rgb(85, 85, 85) !important;
        color: white !important;
        width: 80px !important;
        margin-right: 5px;
    }

    .btn-secondary{
        background-color: black !important;
    }

    .btn-secondary:hover{
        background-color: rgb(59, 59, 59) !important;
        border-color: white !important;
    }

    .id-prod-bc{
        font-family: 'Open Sans', sans-serif;
    }

    .product_gallery{
        overflow: hidden;
    }

    .btn-submit{
        display: block;
        margin-right: 1%;
        width: 100%;
    }

    .btn-submit a{
        border: 1px dashed rgb(54, 54, 54);
        border-color: white !important;
        color: white;
        border-radius: 4px;
        display: block;
        width: 100%;
        text-align: center;
        padding: 12px 0;
        font-size: 1.5em;
    }

    .btn-submit a:hover{
        color: rgb(128, 128, 128);
        border-color: black !important;
        background-color: rgb(209, 209, 209);
    }

    .tumbs{
        overflow: hidden;
    }

    .tumbs .tumb{
        position: relative;
        float: left;
        margin: 1%;
        width: 48%;
    }

    .tumbs .tumb a{
        display: inline-block;
        position: absolute;
        bottom: 8px;
        right: 8px;
    }
    
    .tumbs .tumb img{
        width: 100%;
        border-radius: 4px;
    }

</style>

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ url('/admin/productos/sprays/p') }}">Sprays</a>
<a class="breadcrumb-item" href="{{ url('/admin/productos/spray/agregar') }}">Agregar Spray</a>
@endsection

@section('content')

<div class="container">
    @include('partials.flash-message')
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <div style="padding-inline-end: 10px; margin-right: 20px;" class="row">
                        <div class="col-11">
                            <h2 class="title"><i class="fas fa-plus-square logo-addprod"></i>Editar Spray</h2>
                        </div>
                        <div class="col-1">
                            <input class="form-control form-id-prod text-center" type="text" id="id_prod" name="id_prod" placeholder="{{$spray->id_spray}}" value="{{$spray->id_spray}}" readonly>
                        </div>
                    </div>
                    
                    
                </div>
        
                <div class="inside">
                    <form class="col-12 needs-validation" action="{{ route('spray.update', $spray->id_spray) }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-md-5">
                                <label for="nombre">Nombre:</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-tag"></i></span>
                                    <input type="text" class="form-control" id="nom_prod" name="nom_prod" value="{{ $prod->nom_prod }}"
                                        placeholder="Nombre de producto" maxlength="55" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Por favor, ingrese nombre del producto.</div>
                                </div>
                            </div>
        
                            <div class="col-md-5">
                                <label for="imagen">Imagen destacada:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="img_prod" name="img_prod" accept="image/*">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
        
                            <div class="col-md-2">
                                <label for="estado_prod">Estado:</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-toggle-on"></i></span>
                                    <select class="form-select" id="estado_prod" name="estado_prod" value="P" value="{{ $prod->estado_prod }}" required>
                                      <option value="P">Público</option>
                                      <option value="B">Borrador</option>
                                    </select>
                                </div>
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="precio">Precio:</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                                    <input class="form-control" id="precio_prod" name="precio_prod" min="0" value="{{ $prod->precio_prod }}"
                                        placeholder="Precio del producto" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Por favor, ingrese precio del producto.</div>
                                </div>
                            </div>
        
                            <div class="col-md-2">
                                <label for="alto">Marca:</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-signature"></i></span>
                                    <input class="form-control" id="marca_spr" name="marca_spr" min="0"
                                        placeholder="Marca del producto" value="{{ $spray->marca }}" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Por favor, ingrese marca del producto.</div>
                                </div>
                            </div>
        
                            <div class="col-md-2">
                                <label for="ancho">Cantidad (ml.):</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-sort-amount-up-alt"></i></span>
                                    <input class="form-control" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="cantidad_spr" name="cantidad_spr" min="0"
                                        placeholder="Cantidad del producto" value="{{ $spray->cantidad }}" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Por favor, ingrese cantidad del producto.</div>
                                </div>
                            </div>
        
                            <div class="col-md-2">
                                <label for="largo">Color:</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-paint-roller"></i></span>
                                    <input class="form-control" id="color_spr" name="color_spr" min="0"
                                        placeholder="Color del producto" value="{{ $spray->color }}" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Por favor, ingrese color del producto.</div>
                                </div>
                            </div>
        
                            {{-- <div class="col-md-1"></div> --}}
        
                            <div class="col-md-2">
                                <label for="stock-critico">Stock:</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-sort-numeric-up-alt"></i></span>
                                    <input type="number" class="form-control text-end" id="total" name="total" min="0" value="{{ $prod->stock_prod }}"
                                        required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Valide el STOCK.</div>
                                </div>
                            </div>
        
        
                            <div class="col-md-2">
                                <label for="stock-critico">Crítico:</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-sort-amount-down"></i></span>
                                    <input type="number" class="form-control" id="crit_prod" name="crit_prod" min="0" value="{{ $prod->crit_prod }}" placeholder="{{ $prod->stock_prod }}"
                                        placeholder="Stock crítico" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ingrese STOCK CRÍTICO.</div>
                                </div>
                            </div>
        
                        </div>
        
                        <div class="row mt-3">
                            <label for="descr_prod">Descripción (opcional) :</label> 
                            <div class="col-md-12">
                                <input type="textarea" name="descr_prod" id="descr_prod" class="form-control" value="{{ $prod->descr_prod }}">                   
                            </div>
                        </div>
                        <input class="form-control form-id-prod" type="text" id="id_prod" name="id_prod" placeholder="{{$spray->id_spray}}" value="{{$spray->id_spray}}" readonly hidden>
                        <div class="d-flex flex-row-reverse mt-2">
                            <button type="submit" class="btn btn-secondary" data-path="admin/producto" data-action="agregar_producto">Guardar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- FORMULARIO DERECHA --}}
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-image logo-addprod"></i>Imagen Destacada</h2>
                </div>
                <div class="inside">
                    <img src="{{url('/uploads/productos/sprays/'.$prod->file_path.'/t_'.$prod->img_prod)}}" class="img-fluid" data-fancybox="gallery">
                </div>
            </div>

            <div class="panel shadow mt-2">
                <div class="header">
                    <h2 class="title"><i class="fas fa-images logo-addprod"></i>Galería</h2>
                </div>
                <div class="inside product_gallery">
                    <form class="col-12 needs-validation" action="{{ route('spray.galeria.agregar', $prod->id_prod) }}" method="POST" enctype="multipart/form-data" id="form_galeria" novalidate>
                    @csrf
                        <div class="input-group">
                            <input style="display: none" type="file" class="form-control" id="img_prod_gal" name="img_prod_gal" accept="image/*">
                            <div class="valid-feedback"></div>
                        </div>
                    </form>

                    <div class="btn-submit">
                        <a href="#" id="btn_img_prod_gal"><i class="fas fa-plus"></i></a>
                    </div>

                    <div class="tumbs">
                        @foreach ($prod->getGaleria as $img)
                        <div class="tumb">
                            <a class="btn btn-info" href="{{ url('/admin/producto/spray/'.$prod->id_prod.'/galeria/'.$img->id_gal.'/eliminar') }}"><i class="fas fa-trash"></i></a>
                            <img src="{{ url('/uploads/productos/sprays/'.$img->file_path.'/t_'.$img->file_name) }}" alt="" data-fancybox="gallery">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

{{-- SCRIPT VALIDATION --}}
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

{{-- <script>
    $("#precio_prod").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{3})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});
</script>

<script>
    function sumar()
    {
    const $total = document.getElementById('total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "monto" ) ].forEach( function ( element ) {
        if(element.value !== '') {
        subtotal += parseFloat(element.value);
        }
    });
    $total.value = subtotal;
    }
</script> --}}
@endsection

