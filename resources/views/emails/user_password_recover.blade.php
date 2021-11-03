@extends('emails.master')

@section('content')

    <div style="color: #34495e; margin: 4% 10% 2%; text-align: center;font-family: Sans-serif">

        <h2 style="color: #333; margin: 0 0 7px">Hola {{ $nombre }}<strong></h2>

        <p style="margin: 2px; font-size: 18px"> Este es un correo electrónico que le ayudará a reestablecer la contraseña
            de su cuenta</p>
    </div>

    <div class="container" style="color: #333;font-family: Sans-serif">
        <p style="margin: 20px; font-size: 18px"><strong>Para continuar ingrese el siguiente codigo en la página:</strong>
        </p>
        <p></p>
    </div>

    <div style="color: #34495e; margin: 4% 10% 2%; text-align: center;font-family: Sans-serif; font-size: 20px">
        <h2>{{ $code }}</h2>

        {{-- <p><a href="{{ url('/reset?email='.$email) }}"
                    style="display: inline-block; background-color:#396591; color: #fff; padding: 12px; border-radius: 4px; text-decoration:none;">Reestablecer
                    contraseña</a></p> --}}
        <p style="margin: 20px; font-size: 18px"><strong> ¡RECUERDE!, el código será su nueva contraseña momentánea.</strong> </p>
        <p></p>
    </div>

    {{-- <div class="container" style="color: #333;font-family: Sans-serif">
        <p style="margin: 20px; font-size: 18px">Si el botón anterior no le funciona, ingrese haciendo clic en el siguiente
            enlace:</p>

       
            <p style="margin: 20px; font-size: 14px">{{ url('/reset?email='.$email) }}</p>
        

        <p></p>
        <p>&nbsp;</p>
    </div> --}}

@stop
