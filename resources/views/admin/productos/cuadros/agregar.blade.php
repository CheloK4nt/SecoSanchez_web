
@extends('admin.master')

@section('title','Agregar Producto')

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

    .btn-secondary{
        background-color: black !important;
    }

    .btn-secondary:hover{
        background-color: rgb(59, 59, 59) !important;
        border-color: white !important;
    }

    .form-id-prod{
        margin-top: 10px;
        font-family: 'consolas';
        padding: 3px !important;
        padding-inline: 5px !important;
        background-color: rgb(85, 85, 85) !important;
        color: white !important;
    }
    

</style>

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ url('/admin/productos/cuadros/p') }}">Cuadros</a>
<a class="breadcrumb-item" href="{{ url('/admin/productos/cuadro/agregar') }}">Agregar Cuadro</a>
@endsection

@section('content')

<div class="container">
    @include('partials.flash-message')
</div>

<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <div style="padding-inline-end: 10px;" class="row">
                <div class="col-11">
                    <h2 class="title"><i class="fas fa-plus-square logo-addprod"></i>Agregar Cuadro</h2>
                </div>
                <div class="col-1">
                    <input class="form-control form-id-prod text-center" type="text" id="id_prod" name="id_prod" placeholder="{{$id_cuadro}}" value="{{$id_cuadro}}" readonly>
                </div>
            </div>
            
            
        </div>

        <div class="inside">
            <form class="col-12 needs-validation" action="{{ url('admin/producto/cuadro/store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
                <div class="row">
                    <div class="col-md-5">
                        <label for="nombre">Nombre:</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tag"></i></span>
                            <input type="text" class="form-control" id="nom_prod" name="nom_prod"
                                placeholder="Nombre de producto" maxlength="55" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese nombre del producto.</div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label for="imagen">Imagen destacada:</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="img_prod" name="img_prod" accept="image/*" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, seleccione imagen del producto.</div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="estado_prod">Estado:</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-toggle-on"></i></span>
                            <select class="form-select" id="estado_prod" name="estado_prod" value="P" required>
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
                            <input class="form-control" id="precio_prod" name="precio_prod" min="0"
                                placeholder="Precio del producto" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese precio del producto.</div>
                        </div>
                    </div>

                    {{-- <div class="col-md-1"></div> --}}

                    <div class="col-md-2">
                        <label for="alto">Alto (cm.):</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-height"></i></span>
                            <input class="form-control" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57'{{-- maxlength="3" type="number" --}} id="alto_cdr" name="alto_cdr" min="0"
                                placeholder="Altura del producto" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese altura del producto.</div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="ancho">Ancho (cm.):</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                            <input class="form-control" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="ancho_cdr" name="ancho_cdr" min="0"
                                placeholder="Ancho del producto" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese ancho del producto.</div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="largo">Largo (cm.):</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-ruler"></i></span>
                            <input class="form-control" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="largo_cdr" name="largo_cdr" min="0"
                                placeholder="Largo del producto" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor, ingrese largo del producto.</div>
                        </div>
                    </div>

                    {{-- <div class="col-md-1"></div> --}}

                    <div class="col-md-2">
                        <label for="stock-critico">Stock:</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-sort-numeric-up-alt"></i></span>
                            <input type="number" class="form-control text-end" id="total" name="total" min="0"
                                required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Valide el STOCK.</div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="stock-critico">Crítico:</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-sort-amount-down"></i></span>
                            <input type="number" class="form-control" id="crit_prod" name="crit_prod" min="0"
                                placeholder="Stock crítico" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Ingrese STOCK CRÍTICO.</div>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">
                    <label for="descr_prod">Descripción (opcional) :</label> 
                    <div class="col-md-12">
                        <input type="textarea" name="descr_prod" id="descr_prod" class="form-control">                   
                    </div>
                </div>
                <input class="form-control form-id-prod" type="text" id="id_prod" name="id_prod" placeholder="{{$id_cuadro}}" value="{{$id_cuadro}}" readonly hidden>
                <div class="d-flex flex-row-reverse mt-2">
                    <button type="submit" class="btn btn-secondary" data-path="admin/producto" data-action="agregar_producto">Guardar Producto</button>
                </div>
            </form>
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

<script>
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

@endsection

