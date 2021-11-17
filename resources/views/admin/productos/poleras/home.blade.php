
@extends('admin.master')

@section('title','Poleras')

<style>
    .panel{
        background-color: rgb(133, 133, 133);
        border-radius: 5px;
        border-bottom: 5px solid rgb(170, 170, 170);
        width: 100%;
    }

    .panel .header{
        border-bottom: 1px solid rgb(168, 168, 168);
        padding: 5px;
        padding-inline-end: 50px;
    }

    .panel ul{
        display: inline-block;
        float: right;
    }

    .panel ul li{
        display: inline-block;
        position: relative;
    }

    .panel ul li:hover ul{
        display: block;
    }

    .panel ul li:hover ul li a{
        color: white;
        font-size: 1.1em;
        padding: 10px;
        display: block;
    }

    .panel ul li ul li a i{
        margin-right: 5px;
    }

    .panel ul li:hover ul li a i{
        color: rgb(31, 31, 31);
        padding: 2px;
    }

    .panel ul li:hover ul li:hover{
        display: block;
        background-color: rgb(184, 184, 184);
    }

    .panel ul li ul{
        background-color: rgb(85, 85, 85);
        display: none;
        float: none;
        position: absolute;
        width: 120px;
    }

    .panel ul li ul li{
        display: block;
        width: 100%;
    }

    h2.title{
        display: inline-block;
        color: white;
        font-size: 1.2em;
        padding: 5px;
    }

    .logo-prod{
        padding: 5px;
    }

    .inside{
        padding: 16px;
    }

    .btn-secondary{
        background-color: black !important;
        margin-top: 5px;
    }

    .head-btn{
        color: white;
        padding: 5px;
        font-size: 1.2em;
    }

    .head-btn:hover{
        background-color: rgba(255, 255, 255, 0.404);
        color: rgb(77, 77, 77);
    }

    .head-btn i{
        color: rgb(50, 50, 50);
        padding: 8px;
    }

    .btn-secondary:hover{
        background-color: rgb(59, 59, 59) !important;
        border-color: white !important;
    }

    td{
        font-family: 'Open Sans', sans-serif;
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

    .pagination > li > a{
        background-color: rgb(56, 56, 56);
        color: #ffffff;
    }

    .pagination > li > a:focus,
    .pagination > li > a:hover,
    .pagination > li > span:focus,
    .pagination > li > span:hover{
        color: #5a5a5a;
        background-color: rgb(0, 0, 0);
        border-color: rgb(255, 255, 255);
    }

    .btn-info{
        color: white !important;
        background-color: black !important;
        border-color: white !important;
    }

    .btn-info:hover{
        background-color: rgb(211, 211, 211) !important;
        color: rgb(0, 0, 0) !important;
        border-color: rgb(0, 0, 0) !important;
    }

    .btn-info:focus{
        box-shadow: inset 0 0px 0px , 0 0 8px rgb(0, 0, 0) !important;
        border-color: rgb(114, 114, 114) !important;
    }

    .form-search{
        
    }

</style>

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ url('/admin/productos/poleras/p') }}">Poleras</a>
@endsection

@section('content')

<div class="container">
    @include('partials.flash-message')
</div>

<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
                <h2 class="title"><i class="fas fa-box-open logo-prod"></i>Poleras</h2>  

                <ul>
                    <li>
                        <a href="{{ url('/admin/productos/polera/agregar') }}" class="head-btn"><i class="fas fa-plus-square"></i>Agregar Polera</a>
                    </li>
                    <li>
                        <a href="#" class="head-btn">Filtrar<i class="fas fa-chevron-down"></i></a>
                        <ul class="shadow">
                            <li><a href="{{ url('/admin/productos/poleras/p') }}" class="filtro-btn"><i class="fas fa-globe-americas"></i>Público</a></li>
                            <li><a href="{{ url('/admin/productos/poleras/b') }}" class="filtro-btn"><i class="fas fa-eraser"></i>Borrador</a></li>
                            <li><a href="{{ url('/admin/productos/poleras/all') }}" class="filtro-btn"><i class="fas fa-list"></i>Todos</a></li>
                            <li><a href="{{ url('/admin/productos/poleras/trash') }}" class="filtro-btn"><i class="far fa-trash-alt"></i>Papelera</a></li>
                        </ul>
                    </li>
                </ul>              
        </div>

        <div class="inside">

            <div class="form-search">
                <form class="needs-validation" action="{{ url('/admin/productos/polera/search') }}" method="POST" novalidate>
                @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="search" name="search" placeholder="Búsqueda por nombre..." required>
                                <button type="submit" class="btn btn-info">Buscar</button>
                                <div class="invalid-feedback">Debe ingresar el NOMBRE a buscar.</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <table class="table mt-2">
                <thead>
                    <tr>
                        <th class="head-td">ID</th>
                        <th class="head-td">NOMBRE</th>
                        <th class="head-td">IMAGEN</th>
                        <th class="head-td">PRECIO</th>
                        <th class="head-td">DSCTO.</th>
                        <th class="head-td">STOCK</th>
                        <th class="head-td">CRITICO</th>
                        <th class="head-td">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($poleras as $polera)
                        <tr @if($polera->estado_prod == "B") class="table-warning" @elseif($polera->deleted_at != Null) class="table-danger" @else class="table-secondary" @endif>
                            <td class="body-td">{{$polera->id_prod}}</td>
                            <td class="body-td">{{$polera->nom_prod}}</td>
                            <td class="body-td" style="width: 64px">
                                <a href="{{url('/uploads/productos/poleras/'.$polera->file_path.'/'.$polera->img_prod)}}">
                                    <img src="{{url('/uploads/productos/poleras/'.$polera->file_path.'/t_'.$polera->img_prod)}}" width="64px" data-fancybox="gallery">
                                </a>                         
                            </td>
                            <td class="body-td text-end">
                                @php
                                    echo "$".number_format($polera->precio_prod, 0, ',', '.');
                                @endphp
                            </td>
                            <td class="body-td">{{$polera->en_dcto_prod}}</td>
                            <td class="body-td">{{$polera->stock_prod}}</td>
                            <td class="body-td">{{$polera->crit_prod}}</td>
                            <td class="body-td">
                                @if ($polera->deleted_at == Null)
                                    <a class="btn btn-secondary" href="{{ route('polera.edit',$polera->id_prod) }}"><i class="fas fa-edit"></i></a>                            
                                    <a class="btn btn-secondary btn-confirmar-modal" href="#" data-action="delete_polera" data-path="admin/producto/polera"  data-object="{{ $polera->id_prod }}" ><i class="fas fa-trash"></i></a>
                                @endif
                                @if ($polera->deleted_at != Null)
                                    <a class="btn btn-secondary btn-confirmar-modal" href="#" data-action="restore_polera" data-path="admin/producto/polera" data-object="{{ $polera->id_prod }}"><i class="fas fa-trash-restore"></i></a>
                                @endif
                                {{-- <a class="btn btn-secondary" href="{{ route('categoria.edit',$categoria->id_cat) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-secondary" href="{{ route('categoria.destroy',$categoria->id_cat) }}"><i class="fas fa-trash"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <tr>
                <td colspan="10">{!! $poleras->render() !!}</td>
            </tr>

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