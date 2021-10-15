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
}

</style>

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ url('/admin/categorias') }}">Categorías</a>
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
                    <h2 class="title" style="font-weight: bold"><i class="fas fa-plus-square logo-addprod"></i>Agregar Categoría</h2>
                </div>
                <div class="inside">
                    <form class="needs-validation" action="{{ url('admin/categoria/store') }}" method="POST" novalidate>
                    @csrf
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            
                            <div class="col-4">
                                <label for="nom_cat">Categoría:</label>
                            </div>
                            <div class="col-3">
                                <input class="form-control form-id-cat" type="text" id="id_cat" name="id_cat" placeholder="{{$id_categoria}}" value="{{$id_categoria}}" readonly>
                            </div>
                            
                        </div>
                        <div class="input-group mt-2">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tag"></i></span>
                            <input type="text" class="form-control" id="nom_cat" name="nom_cat"
                                placeholder="Nombre de categoría" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback" style="color: rgb(49, 49, 49)">Por favor, ingrese nombre de categoría.</div>
                        </div>
        
                        <div class="d-flex flex-row-reverse mt-2">
                            <button type="submit" class="btn btn-secondary">Guardar Categoría</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- LISTA CATEGORIAS --}}
        <div class="col-md-6">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title" style="font-weight: bold"><i class="far fa-folder-open logo-cats"></i>Categorías</h2>
                </div>
                <div class="inside">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="head-td" width="120">ID</th>
                                <th class="head-td" width="180">NOMBRE</th>
                                <th class="head-td" width="150">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td class="body-td" width="120" height="60">{{ $categoria->id_cat }}</td>
                                    <td class="body-td" width="180" height="60">{{ $categoria->nom_cat }}</td>
                                    <td class="body-td" width="150" height="60">
                                        <a class="btn btn-secondary" href="{{ route('categoria.edit',$categoria->id_cat) }}"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-secondary" href="{{ route('categoria.destroy',$categoria->id_cat) }}" data-action="cat_delete" data-path="admin/categoria" data-object="{{ $categoria->id_cat }}"><i class="fas fa-trash"></i></a>
                                        {{-- <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#confirmacionModal" href="{{ route('categoria.destroy',$categoria->id_cat) }}"><i class="fas fa-trash"></i></a> --}}
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    <tr>
                        <td colspan="10">{!! $categorias->render() !!}</td>
                    </tr>
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

{{-- <!-- Modal -->
<div class="modal fade" id="confirmacionModal" tabindex="-1" aria-labelledby="confirmacionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmacionModalLabel" style="color: black;">{{id_cat}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}

@endsection