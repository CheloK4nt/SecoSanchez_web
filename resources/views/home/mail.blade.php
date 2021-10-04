<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>

<body>
    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
        <tr>
            <td>
                <img style="padding: 0; display: block" src="https://i.imgur.com/RNI3Api.png" alt="logo" width="100%">
            </td>
        </tr>

        <tr>
            <td style="background-color: #e7e7e7;">
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
            </td>
        </tr>
        <tr>
            <td style="padding: 0;">
                <img style="padding: 0; display: block"
                    src="https://i.imgur.com/Xs4uYhT.png"
                    width="100%">
            </td>
        </tr>
    </table>
    ';

</body>

</html>
