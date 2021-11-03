@extends('admin.master')

@section('title', 'Dashboard')


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
        font-size: 1.2em;
        padding: 12px;
    }

    .logo-db{
        padding: 5px;
    }

    .inside{
        padding: 16px;
    }

    h2.users{
        font-size: 1.1em;
        padding: 12px;
        display: inline-block;
    }

    .big_count{
        font-family: 'Open Sans', sans-serif;
        text-align: center;
        font-size: 2em;
    }

</style>


@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="far fa-chart-bar logo-db"></i>Estadísticas rápidas</h2>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="users"><i class="fas fa-users logo-db"></i>Usuarios registrados</h2>
                </div>
                <div class="inside">
                    <div class="big_count">{{$usuarios}}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="users"><i class="fas fa-clipboard-list logo-db"></i>Productos listados</h2>
                </div>
                <div class="inside">
                    <div class="big_count">{{$productos}}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="users"><i class="fas fa-cash-register logo-db"></i>Ganancias hoy</h2>
                </div>
                <div class="inside">
                    <div class="big_count">0</div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection