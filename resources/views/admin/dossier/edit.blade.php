@extends('admin.master')

@section('title','Editar Publicación')

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
        width: 70px !important;
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
<a class="breadcrumb-item" href="{{ url('/admin/dossier') }}">Dossier</a>
<a class="breadcrumb-item id-prod-bc" href="{{ route('dossier.edit',$dossi -> id_dossier) }}">{{$dossi -> id_dossier}}</a>
@endsection

@section('content')

<div class="container">
    @include('partials.flash-message')
</div>

<div class="container-fluid">
    <div class="row">
        {{-- FORMULARIO IZQUIERDA --}}
        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <div class="row row-head">
                        <div class="col">
                            <h2 class="title"><i class="fas fa-plus-square logo-addprod"></i>Editar Publicación</h2>
                        </div>
                        <div class="col">
                            <ul class="float-end">
                                <input class="form-control form-id-prod" type="text" id="id_prod" name="id_prod" placeholder="{{$dossi->id_dossier}}" value="{{$dossi->id_dossier}}" readonly>
                            </ul>
                        </div>
                    </div>    
                </div>
        
                <div class="inside">
                    <form class="col-12 needs-validation" action="{{ route('dossier.update', $dossi->id_dossier) }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                        <div class="row"> 
                            <div class="col-md-5">
                                <label for="imagen">Imagen destacada (opcional):</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="img_dossier" name="img_dossier" accept="image/*">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <input class="form-control form-id-prod" type="text" id="id_dossier" name="id_dossier" placeholder="{{$dossi->id_dossier}}" value="{{$dossi->id_dossier}}" readonly hidden>
                        <div class="d-flex flex-row-reverse mt-2">
                            <button type="submit" class="btn btn-secondary">Guardar Modificación</button>
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
                    <img src="{{url('/uploads/'.$dossi->file_path.'/t_'.$dossi->img_dossier)}}" class="img-fluid" data-fancybox="gallery">
                </div>
            </div>

            {{-- <div class="panel shadow mt-2">
                <div class="header">
                    <h2 class="title"><i class="fas fa-images logo-addprod"></i>Galería</h2>
                </div>
                <div class="inside product_gallery">
                    <form class="col-12 needs-validation" action="{{ route('dossier.galeria.agregar', $dossi->id_dossier) }}" method="POST" enctype="multipart/form-data" id="form_galeria" novalidate>
                    @csrf
                        <div class="input-group">
                            <input style="display: none" type="file" class="form-control" id="img_dossi_gal" name="img_dossi_gal" accept="image/*">
                            <div class="valid-feedback"></div>
                        </div>
                    </form>

                    <div class="btn-submit">
                        <a href="#" id="btn_img_dossi_gal"><i class="fas fa-plus"></i></a>
                    </div>

                    <div class="tumbs">
                        @foreach ($dossi->getGaleria as $img)
                        <div class="tumb">
                            <a class="btn btn-info" href="{{ url('/admin/dossier/'.$dossi->id_dossier.'/galeria/'.$img->id_gal.'/eliminar') }}"><i class="fas fa-trash"></i></a>
                            <img src="{{ url('/uploads/'.$img->file_path.'/t_'.$img->file_name) }}" alt="" data-fancybox="gallery">
                            @php
                                dd(url('/uploads/'.$img->file_path.'/t_'.$img->file_name));
                            @endphp
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}
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