<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <meta name="auth" content="{{ Auth::check() }}">

    <title></title>
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
                @yield('content')
            </td>
        </tr>
        <tr>
            <td style="padding: 0;">
                <img style="padding: 0; display: block" src="https://i.imgur.com/Xs4uYhT.png" width="100%">
            </td>
        </tr>
    </table>
</body>
</html>
