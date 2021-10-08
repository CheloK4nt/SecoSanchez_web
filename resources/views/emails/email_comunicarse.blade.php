@extends('emails.master')

@section('content')

<div style="color: #34495e; margin: 4% 10% 2%; text-align: center;font-family: Sans-serif">
    <h2 style="color: #333; margin: 0 0 7px">Hola SecoSanchez, te informo que el cliente: <strong></h2>
    <h2>{{ $contacto['nombre'] }} {{ $contacto['apellido'] }}</h2>
    <p style="margin: 2px; font-size: 18px"> Quiere comunicarse contigo...</p>
    <p>&nbsp;</p>
</div>
<div class="container" style="color: #333;font-family: Sans-serif">
    <p style="margin: 20px; font-size: 18px"><strong>Esta es su información de contacto:</strong> </p>
    <p></p>
    <p style="margin-left: 40px; font-size: 15px"><strong>- Nombre: </strong>{{$contacto['nombre']}} {{$contacto['apellido']}}</p>
    <p style="margin-left: 40px; font-size: 15px"><strong>- Email: </strong>{{$contacto['email']}}</p>
    <p style="margin-left: 40px; font-size: 15px"><strong>- Teléfono: </strong>{{$contacto['telefono']}}</p>
    <p style="margin-left: 40px; font-size: 15px"><strong>- Mensaje: </strong>{{$contacto['mensaje']}}</p>
    <p>&nbsp;</p>
</div>

@stop
