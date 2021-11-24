@extends('admin.master')

@section('title', 'Dossier')

<style>
    .panel {
        background-color: rgb(133, 133, 133);
        border-radius: 5px;
        border-bottom: 5px solid rgb(170, 170, 170);
        width: 100%;
    }

    .panel .header {
        border-bottom: 1px solid rgb(168, 168, 168);
        padding: 5px;
        padding-inline-end: 50px;
    }

    .panel ul {
        display: inline-block;
        float: right;
    }

    .panel ul li {
        display: inline-block;
        position: relative;
    }

    .panel ul li:hover ul {
        display: block;
    }

    .panel ul li:hover ul li a {
        color: white;
        font-size: 1.1em;
        padding: 10px;
        display: block;
    }

    .panel ul li ul li a i {
        margin-right: 5px;
    }

    .panel ul li:hover ul li a i {
        color: rgb(31, 31, 31);
        padding: 2px;
    }

    .panel ul li:hover ul li:hover {
        display: block;
        background-color: rgb(184, 184, 184);
    }

    .panel ul li ul {
        background-color: rgb(85, 85, 85);
        display: none;
        float: none;
        position: absolute;
        width: 120px;
    }

    .panel ul li ul li {
        display: block;
        width: 100%;
    }

    h2.title {
        display: inline-block;
        color: white;
        font-size: 1.1em;
        padding: 12px;
    }

    .logo-addprod {
        padding: 5px;
    }

    .logo-cats {
        padding: 5px;
    }

    .inside {
        padding: 16px;
    }

    .btn-secondary {
        background-color: black !important;
        margin-top: 5px;
    }

    .head-btn {
        color: white;
        padding: 5px;
        font-size: 1.2em;
    }

    .head-btn:hover {
        background-color: rgba(255, 255, 255, 0.404);
        color: rgb(77, 77, 77);
    }

    .head-btn i {
        color: rgb(50, 50, 50);
        padding: 8px;
    }

    .btn-secondary:hover {
        background-color: rgb(59, 59, 59) !important;
        border-color: white !important;
    }

    td {
        font-family: 'Open Sans', sans-serif;
    }

    .head-td {
        background-color: rgb(49, 49, 49) !important;
        color: white;
        font-weight: bold;
        border-width: 2px;
    }

    .body-td {
        background-color: rgb(220, 220, 220);
        color: rgb(49, 49, 49);
        font-weight: bold;
        border-width: 2px;
        border-color: rgb(99, 99, 99);
    }

    .pagination>li>a {
        background-color: rgb(56, 56, 56);
        color: #ffffff;
    }

    .pagination>li>a:focus,
    .pagination>li>a:hover,
    .pagination>li>span:focus,
    .pagination>li>span:hover {
        color: #5a5a5a;
        background-color: rgb(0, 0, 0);
        border-color: rgb(255, 255, 255);
    }

    .btn-info {
        color: white !important;
        background-color: black !important;
        border-color: white !important;
    }

    .btn-info:hover {
        background-color: rgb(211, 211, 211) !important;
        color: rgb(0, 0, 0) !important;
        border-color: rgb(0, 0, 0) !important;
    }

    .btn-info:focus {
        box-shadow: inset 0 0px 0px, 0 0 8px rgb(0, 0, 0) !important;
        border-color: rgb(114, 114, 114) !important;
    }

    .form-search {}

    .form-id-doss {
        font-family: 'consolas';
        padding: 0px !important;
        padding-inline: 5px !important;
        background-color: rgb(85, 85, 85) !important;
        color: white !important;
        font-size: calc(10px + 0.2vw) !important;
        text-align: center;
    }

    /* .w-5{
        display: none;
    } */

</style>

@section('breadcrumb')
    <a class="breadcrumb-item" href="{{ url('/admin/dossier') }}">Dossier</a>
@endsection

@section('content')

    <div class="container">
        @include('partials.flash-message')
    </div>

    <div class="container-fluid">
        <div class="row">
            {{-- PANEL AGREGAR DOSSIER --}}
            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title" style="font-weight: bold"><i
                                class="fas fa-plus-square logo-addprod"></i>Agregar Publicación</h2>
                    </div>
                    <div class="inside">
                        <form class="needs-validation" action="{{ url('admin/dossier/store') }}" method="POST"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            {{-- TÍTULO DOSSIER --}}
                            <div class="row">
                                <div class="d-flex justify-content-between">
                                    <div class="col-4">
                                        <label for="titulo_dossier">Título:</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control form-id-doss" type="text" id="id_dossier"
                                            name="id_dossier" placeholder="{{ $id_dossier }}" value="{{ $id_dossier }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" id="titulo_dossier" name="titulo_dossier"
                                        required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Por favor, ingrese nombre de la publicación.</div>
                                </div>
                            </div>
                            {{-- TÍTULO DOSSIER --}}
                            <br>
                            {{-- IMÁGEN DOSSIER --}}
                            <div class="row">
                                <div class="d-flex justify-content-between">
                                    <div class="col-4">
                                        <label for="nom_cat">Foto:</label>
                                    </div>
                                </div>
                                <div class="input-group mt-2">
                                    <input type="file" class="form-control" id="img_dossier" name="img_dossier"
                                        accept="image/*" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Por favor, seleccione imagen de la publicación.</div>
                                </div>
                            </div>
                            {{-- IMÁGEN DOSSIER --}}
                            <br>
                            {{-- TIPO DOSSIER --}}
                            <div class="row">
                                <div class="d-flex justify-content-between">
                                    <div class="col-4">
                                        <label for="tipo_dossier">Tipo:</label>
                                    </div>
                                </div>
                                <div class="input-group mt-2">
                                    <select style="padding: 5px" name="tipo_dossier" id="tipo_dossier" 
                                        onchange="showHide(this.value)" required>
                                        {{-- <option value="0">--Seleccione Tipo--</option> --}}
                                        <option default>Seleccione una opción</option>
                                        <option value="Cuadro">Cuadro</option>
                                        <option value="Mural">Mural</option>
                                    </select>
                                </div>
                                <script>
                                    element_es = document.getElementById('desc_dossier_es');
                                    element_en = document.getElementById('desc_dossier_en');
                                    element_es.style.display = 'none'; 
                                    element_en.style.display = 'none'; 

                                    function showHide(value) {
                                        if (value == 'Cuadro') {
                                            document.getElementById('desc_dossier_es').style.display = 'none';
                                            document.getElementById('desc_dossier_en').style.display = 'none';
                                        } else {
                                            document.getElementById('desc_dossier_es').style.display = 'block';
                                            document.getElementById('desc_dossier_en').style.display = 'block';
                                        }
                                    }
                                    /* function showHide(estado) {
                                        element = document.getElementById('desc_dossier');
                                        estado = element.style.display;
                                        if(estado == 'none'){
                                        element.style.display='block'
                                        }else{
                                        element.style.display = 'none';
                                        } 
                                    } */
                                </script>
                            </div>
                            {{-- TIPO DOSSIER --}}
                            <br>
                            {{-- DESCRIPCIÓN ESPAÑOL DOSSIER --}}
                            <div class="row" id="desc_dossier_es">
                                <div class="d-flex justify-content-between">
                                    <div class="col-5">
                                        <label for="desc_dossier_es">Descripción (Español):</label>
                                    </div>
                                </div>
                                <div class="input-group mt-2">
                                    <textarea type="text" style="height: 100px" class="form-control" id="desc_dossier_es"
                                        name="desc_dossier_es" placeholder="Ingrese descripción..." {{-- required --}}></textarea>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Por favor, ingrese descripción en español del Mural.</div>
                                </div>
                            </div>
                            {{-- DESCRIPCIÓN ESPAÑOL DOSSIER --}}
                            <br>
                            {{-- DESCRIPCIÓN INGLÉS DOSSIER --}}
                            <div class="row" id="desc_dossier_en">
                                <div class="d-flex justify-content-between">
                                    <div class="col-5">
                                        <label for="desc_dossier_en">Descripción (Inglés):</label>
                                    </div>
                                </div>
                                <div class="input-group mt-2">
                                    <textarea type="text" style="height: 100px" class="form-control" id="desc_dossier_en"
                                        name="desc_dossier_en" placeholder="Ingrese descripción..." {{-- required --}}></textarea>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Por favor, ingrese descripción en Inglés del Mural.</div>
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse mt-2">
                                <button type="submit" class="btn btn-secondary">Guardar Publicación</button>
                            </div>
                            {{-- DESCRIPCIÓN ESPAÑOL DOSSIER --}}
                        </form>
                    </div>
                </div>
            </div>

            {{-- LISTA DOSSIER --}}
            <div class="col-md-6">
                <div class="panel shadow">
                    <div class="inside">
                        <table class="table mt-2">
                            <thead>
                                <tr>
                                    <th class="head-td" width="120">ID</th>
                                    <th class="head-td" width="120">Título</th>
                                    <th class="head-td" width="180">Foto</th>
                                    <th class="head-td" width="120">Tipo</th>
                                    <th class="head-td" width="150">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dossier as $dossi)
                                    <tr>
                                        {{--ID--}}
                                        <td class="body-td" style="background-color: rgb(220, 220, 220)" width="120"
                                            height="60">{{ $dossi->id_dossier }}
                                        </td>
                                        {{--TÍTULO--}}
                                        <td class="body-td" style="background-color: rgb(220, 220, 220)" width="120"
                                            height="60">{{ $dossi->titulo_dossier }}
                                        </td>
                                        {{--FOTO--}}
                                        <td class="body-td text-center"
                                            style="width: 64px; background-color: rgb(220, 220, 220)" width="180"
                                            height="60">
                                            <a
                                                href="{{ url('/uploads/dossier/' . $dossi->file_path . '/' . $dossi->img_dossier) }}">
                                                <img src="{{ url('/uploads/dossier/' . $dossi->file_path . '/t_' . $dossi->img_dossier) }}"
                                                    width="100px" data-fancybox="gallery">
                                            </a>
                                        </td>
                                        {{--TIPO--}}
                                        <td class="body-td" style="background-color: rgb(220, 220, 220)" width="120"
                                            height="60">{{ $dossi->tipo }}
                                        </td>
                                        {{--ACCIONES--}}
                                        <td class="body-td" style="background-color: rgb(220, 220, 220)" width="150"
                                            height="60">
                                            @if ($dossi->deleted_at == null)
                                                <a class="btn btn-secondary btn-confirmar-modal" href="#"
                                                    data-action="delete_dossier" data-path="admin/dossier"
                                                    data-object="{{ $dossi->id_dossier }}"><i
                                                        class="fas fa-trash"></i></a>
                                                <a class="btn btn-secondary"
                                                    href="{{ route('dossier.edit', $dossi->id_dossier) }}"><i
                                                        class="fas fa-edit"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <tr>
                                <td colspan="10" >{!! $dossier->render() !!}</td>
                            </tr> --}}
                        {{ $dossier->links() }}
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
