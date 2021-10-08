@extends('admin.master')

@section('title','Categorías')

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

    .logo-cats{
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

    .form-id-cat{
        font-family: 'consolas';
        padding: 0px !important;
        padding-inline: 5px !important;
        background-color: rgb(85, 85, 85) !important;
        color: white !important;
    }

    td{
        font-family: 'Open Sans', sans-serif;
    }

    .btn-acciones{
        background-color: rgb(128, 128, 128) !important;
    }

    .head-td{
        background-color: rgb(49, 49, 49) !important;
        color: white;
        font-weight: bold;
        border-width: 2px;
    }

    .body-td{
        background-color: rgb(201, 201, 201) !important;
        color: rgb(49, 49, 49);
        font-weight: bold;
        border-width: 2px;
    }

    .table-fixed tbody{
        min-height: 30px !important;
        max-height: 400px !important;
        overflow-y: auto;
        /* width: 100%; */
    }

    .table-fixed thead,
    .table-fixed tbody,
    .table-fixed td,
    .table-fixed th{
        display: block;
    }

    .table-fixed tbody td,
    .table-fixed thead > tr > th{
        float: left;
        border-bottom-width: 0;
    }

    .id-cat-bc{
        font-family: 'Open Sans', sans-serif;
    }

</style>

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ url('/admin/categorias') }}">Categorías</a>
<a class="breadcrumb-item id-cat-bc" href="{{ route('categoria.edit',$cat -> id_cat) }}">{{$cat -> id_cat}}</a>
@endsection

@section('content')
    <div class="container">
        @include('partials.flash-message')
    </div>
    

<div class="container-fluid">
    <div class="row">

        {{-- PANEL AGREGAR CATEGORIA --}}
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title" style="font-weight: bold"><i class="fas fa-plus-square logo-addprod"></i>Editar Categoría</h2>
                </div>
                <div class="inside">
                    @php
                        $id_cat = $cat -> id_cat;
                        // dd($id_cat)
                    @endphp
                    <form class="needs-validation" action="{{ route('categoria.update', $id_cat) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            
                            <div class="col-4">
                                <label for="nom_cat">Categoría:</label>
                            </div>
                            <div class="col-3">
                                <input class="form-control form-id-cat" type="text" id="id_cat" name="id_cat" placeholder="{{$cat -> id_cat}}" value="{{$cat -> id_cat}}" readonly>
                            </div>
                            
                        </div>
                        <div class="input-group mt-2">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tag"></i></span>
                            <input type="text" class="form-control" id="nom_cat" name="nom_cat" value="{{$cat -> nom_cat}}"
                                placeholder="Nombre de categoría" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback" style="color: rgb(49, 49, 49)">Por favor, ingrese nombre de categoría.</div>
                        </div>
        
                        <div class="d-flex flex-row-reverse mt-2">
                            <button type="submit" class="btn btn-secondary">Guardar Modificación</button>
                        </div>
                    </div>
                    </form>
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


@endsection