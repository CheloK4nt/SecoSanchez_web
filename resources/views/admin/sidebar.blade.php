<style>
    .container-logo{
        padding: 5px;
        text-align: center;
    }

    .sidebar{
        background-color: rgb(0, 0, 0);
        min-height: 100vh;
    }

    .section-top{
        background-color: rgb(46, 46, 46);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    h1{
        text-align: center;
        font-family: Impact;
        font-size: 30px;
        letter-spacing: 2px;
    }

    .user{
        background-color: rgb(56, 56, 56);
        text-align: center;
        padding: 5px;
    }

    .main li{
        margin-bottom: 4px;
    }

    .main li a{
        color: rgb(150, 150, 150);
        display: block;
        font-size: 18px;
        padding: 12px;
        text-decoration: none;
    }

    .main li a:hover{
        background-color: rgb(110, 110, 110);
        color: white;
        font-weight: bold;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .main li a i{
        margin-right: 15px;
    }

    .main{
        display: block;
        margin-top: 10px;
    }

    .section-bot{
        margin-top: 150px;
    }

    .section-bot li{
        background-color: rgb(44, 44, 44);
    }

    .section-bot li a{
        color: rgb(150, 150, 150);
        background-color: rgb(44, 44, 44);
        display: block;
        font-size: 18px;
        padding: 12px;
        text-decoration: none;
    }

    .section-bot li a:hover{
        background-color: rgb(110, 110, 110);
        color: white;
        font-weight: bold;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .section-bot li a i{
        margin-right: 15px;
    }


</style>

<div class="sidebar shadow">
    <div class="section-top">
        <div class="container-logo container-fluid">
            <img class="logo img-fluid" src="/img/login/blessedhands.png" alt="" width="65%">
        </div>
        <h1>SECOSANCHEZ</h1>

        <div class="user">
            <span class="subtitle">¡Bienvenido!</span>
            <div style="font-weight: bold" class="name">
                {{ Auth::user()->nombre }}
            </div>
        </div>
    </div>

    <div class="main">
        <ul>
            <li>
                <a href="{{ url('/admin') }}"><i class="fas fa-box-open"></i></i>Productos</a>
            </li>
            <li>
                <a href="{{ url('/admin') }}"><i class="fas fa-images"></i>Dossier</a>
            </li>
            <li>
                <a href="{{ url('/admin') }}"><i class="far fa-id-card"></i>Usuarios</a>
            </li>
            <li>
                <a href="{{ url('/admin') }}"><i class="fas fa-hand-holding-usd"></i>Ofertas</a>
            </li>
        </ul>
    </div>

    <div class="section-bot">
        <ul>
            <li>
                <a href="{{ route('usuarios.logout') }}"><i class="fas fa-sign-out-alt"></i>Salir</a>
            </li>
        </ul>
        
    </div>
</div>