
@extends('admin.master')

@section('title','Productos')

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

    .logo-prod{
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
        background-color: rgb(201, 201, 201) !important;
        color: rgb(49, 49, 49);
        font-weight: bold;
        border-width: 2px;
    }

</style>

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ url('/admin/productos') }}">Productos</a>
@endsection

@section('content')

<div class="container">
    @include('partials.flash-message')
</div>

<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-box-open logo-prod"></i>Productos</h2>
        </div>

        <div class="inside">
            <div class="btns">
                <a href="{{ url('/admin/producto/agregar') }}" class="btn btn-secondary"> 
                    <i class="fas fa-plus-square"></i>
                    Agregar Producto
                </a>
            </div>

            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th class="head-td">ID</th>
                        <th class="head-td">Nombre</th>
                        <th class="head-td"></th>
                        <th class="head-td">Categoría</th>
                        <th class="head-td">Precio</th>
                        <th class="head-td">Dscto.</th>
                        <th class="head-td">Stock</th>
                        <th class="head-td">Critico</th>
                        <th class="head-td">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $prod)
                        <tr>
                            <td class="body-td">{{$prod->id_prod}}</td>
                            <td class="body-td">{{$prod->nom_prod}}</td>
                            <td class="body-td" style="width: 64px">
                                <a href="{{url('/uploads/'.$prod->file_path.'/'.$prod->img_prod)}}">
                                    <img src="{{url('/uploads/'.$prod->file_path.'/t_'.$prod->img_prod)}}" width="64px" data-fancybox="gallery">
                                </a>                         
                            </td>
                            <td class="body-td">{{$prod->categoria->nom_cat}}</td>
                            <td class="body-td">{{$prod->precio_prod}}</td>
                            <td class="body-td">{{$prod->en_dcto_prod}}</td>
                            <td class="body-td">{{$prod->stock_prod}}</td>
                            <td class="body-td">{{$prod->crit_prod}}</td>
                            <td class="body-td">
                                <a class="btn btn-secondary" href="{{ route('producto.edit',$prod->id_prod) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-secondary" href="{{ route('producto.destroy',$prod->id_prod) }}"><i class="fas fa-trash"></i></a>
                                {{-- <a class="btn btn-secondary" href="{{ route('categoria.edit',$categoria->id_cat) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-secondary" href="{{ route('categoria.destroy',$categoria->id_cat) }}"><i class="fas fa-trash"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection