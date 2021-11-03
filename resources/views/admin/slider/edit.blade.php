@extends('admin.master')

@section('title','Slider')

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

    .logo-add{
        padding: 5px;
    }

    .logo-slides{
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

    .form-id-sli{
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
        background-color: rgb(220, 220, 220);
        color: rgb(49, 49, 49);
        font-weight: bold;
        border-width: 2px;
        border-color: rgb(99, 99, 99);
    }

    /* ojo */
    .pagination > li > a
    {
        background-color: rgb(56, 56, 56);
        color: #ffffff;
    }

    .pagination > li > a:focus,
    .pagination > li > a:hover,
    .pagination > li > span:focus,
    .pagination > li > span:hover
    {
        color: #5a5a5a;
        background-color: rgb(0, 0, 0);
        border-color: rgb(255, 255, 255);
    }

    .id-sli-bc{
        font-family: 'Open Sans', sans-serif;
    }
</style>

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ url('/admin/slider') }}">Slider</a>
<a class="breadcrumb-item id-sli-bc" href="{{ route('slide.edit',$sli -> id_sli) }}">{{$sli -> id_sli}}</a>
@endsection

@section('content')

<div class="container">
    @include('partials.flash-message')
</div>

    <div class="container-fluid">
        <div class="row">
            {{-- PANEL AGREGAR SLIDE --}}
            <div class="col-md-6">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title" style="font-weight: bold"><i class="fas fa-plus-square logo-add"></i>Modificar Slide</h2>
                    </div>
                    <div class="inside">
                        <form class="needs-validation" action="{{ route('slide.update', $sli->id_sli) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                
                                <div class="col-4">
                                    <label for="nom_sli">Slide:</label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control form-id-sli text-center" type="text" id="id_sli" name="id_sli" placeholder="id_sli" value="{{$sli -> id_sli}}" readonly>
                                </div>
                                
                            </div>
                            <div class="input-group mt-2">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-tag" style="font-size: 18"></i></span>
                                <input type="text" class="form-control" id="nom_sli" name="nom_sli" maxlength="50"
                                    placeholder="Título de slide" value="{{$sli -> nom_sli}}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback" style="color: rgb(49, 49, 49)">Por favor, ingrese título de slide.</div>
                            </div>

                            <div class="input-group mt-2">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-tags" style="font-size: 15"></i></span>
                                <textarea type="text" class="form-control" id="sub_sli" name="sub_sli" maxlength="150"
                                    placeholder="Subtitulo de slide" required>{{$sli -> sub_sli}}</textarea>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback" style="color: rgb(49, 49, 49)">Por favor, ingrese subtítulo de slide.</div>
                            </div>

                            <div class="input-group mt-2">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-eye" style="font-size: 16"></i></span>
                                <select class="form-select" id="estado_sli" name="estado_sli" required>
                                    @if ($sli->estado_sli == "1")
                                        <option value="1" selected >Visible</option>
                                        <option value="0">Oculto</option>
                                    @endif
                                    @if ($sli->estado_sli == "0")
                                        <option value="1">Visible</option>
                                        <option value="0" selected >Oculto</option>
                                    @endif
                                </select>
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

