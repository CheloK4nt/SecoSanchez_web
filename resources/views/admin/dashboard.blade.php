@extends('admin.master')

@section('title', 'Productos')


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

    .inside{
        padding: 16px;
    }
</style>


@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-box-open"></i>Productos</i></h2>
        </div>

        <div class="inside">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ad inventore, aliquid possimus assumenda nam dolore voluptatum odit reprehenderit quidem optio praesentium facilis ab voluptate molestias quo quos cupiditate laboriosam!
        </div>
    </div>
</div>
@endsection