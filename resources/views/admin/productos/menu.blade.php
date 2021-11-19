@extends('admin.master')

@section('title','Productos - Menú')

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ url('/admin/productos') }}">Menú Productos</a>
@endsection

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
        padding: 40px;
    }

    .btn-secondary{
        background-color: black !important;
        margin-top: 5px;
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

    .menu-prod-btn{
        background: rgb(66, 66, 66);
        color: white;
        padding: 1vw;
        font-size: calc(10px + .7vw);
        text-align: center;
        }
        .menu-prod-btn:hover{
            background: rgb(0, 0, 0);
            color: white;
        }
        .menu-prod-btn i{
            padding: .7vw;
        }

</style>

@section('content')

<div class="container">
    @include('partials.flash-message')
</div>

<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-box-open logo-prod"></i>Menú Productos</h2>               
        </div>

        <div class="inside">
            <div class="row d-flex justify-content-between">
                <div class="col text-center">
                    <a href="{{ url('/admin/productos/poleras/p') }}" class="menu-prod-btn"><i class="fas fa-tshirt"></i>Poleras</a>
                </div>
                <div class="col text-center">
                    <a href="{{ url('/admin/productos/cuadros/p') }}" class="menu-prod-btn"><i class="far fa-image"></i>Cuadros</a>
                </div>
                <div class="col text-center">
                    <a href="{{ url('/admin/productos/sprays/p') }}" class="menu-prod-btn"><i class="fas fa-spray-can"></i>Sprays</a>
                </div>       
            </div>
        </div>
    </div>
</div>

@endsection