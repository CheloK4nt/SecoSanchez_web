<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />

    <style>

      li{
        list-style-type: none;
        margin: 5px;
      }

      body{
        padding-top: 10px;
        background-image: url(/img/fondo2pac.png);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color: rgb(255, 255, 255);
      }

      .navbar{
        background-color: black;
      }

      /* ----------DISEÑO LOGO BUTTON---------- */
      .logo-btn{
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: rgb(255, 255, 255);
        text-transform: uppercase;
        letter-spacing: 3px;
        text-decoration: none;
        font-family: consolas;
        font-size: 20px;
        overflow: hidden;
        transition: 0.2s;
      }

      .logo-btn span{
        position: absolute;
        display: block;
      }

      .logo-btn:hover{
        color: black;
        background-color: rgb(255, 255, 255);
      }

      .logo-btn span:hover{
        color: black;
      }
      /* ----------FIN DISEÑO LOGO BUTTON---------- */

      /* ----------ANIMACION LOGO BUTTON---------- */

      /* Linea superior */
      .logo-btn span:nth-child(1){
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, white);
        animation: animate1 1s linear infinite;
      }

      .logo-btn:hover span:nth-child(1){
        background: linear-gradient(90deg, transparent, rgb(0, 0, 0));
      }

      @keyframes animate1{
        0%
        {
          left: -100%;
        }
        50%,100%
        {
          left: 100%;
        }
      }
      /* fin linea superior */
      
      /* Linea derecha */
      .logo-btn span:nth-child(2){
        top: -100%;
        right: 0;
        width: 2px;;
        height: 100%;
        background: linear-gradient(180deg, transparent, white);
        animation: animate2 1s linear infinite;
        animation-delay: 0.25s;
      }

      .logo-btn:hover span:nth-child(2){
        background: linear-gradient(180deg, transparent, rgb(0, 0, 0));
      }

      @keyframes animate2{
        0%
        {
          top: -100%;
        }
        50%,100%
        {
          top: 100%;
        }
      }
      /* fin linea derecha */

      /* Linea inferior */
      .logo-btn span:nth-child(3){
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent, white);
        animation: animate3 1s linear infinite;
        animation-delay: 0.5s;
      }

      .logo-btn:hover span:nth-child(3){
        background: linear-gradient(270deg, transparent, rgb(0, 0, 0));
      }

      @keyframes animate3{
        0%
        {
          right: -100%;
        }
        50%,100%
        {
          right: 100%;
        }
      }
      /* fin linea inferior */

      /* Linea izquierda */
      .logo-btn span:nth-child(4){
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg, transparent, white);
        animation: animate4 1s linear infinite;
        animation-delay: 0.75s;
      }

      .logo-btn:hover span:nth-child(4){
        background: linear-gradient(90deg, transparent, rgb(0, 0, 0));
      }

      @keyframes animate4{
        0%
        {
          top: 100%;
        }
        50%,100%
        {
          top: -100%;
        }
      }
      /* fin linea izquierda */

      
      /* ---------- FIN ANIMACION LOGO BUTTON---------- */

      /* ----------DISEÑO NAV BUTTONS---------- */
      .nav-btns{
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: rgb(255, 255, 255);
        text-transform: uppercase;
        letter-spacing: 2px;
        text-decoration: none;
        font-size: 15px;
        overflow: hidden;
        border-radius: 10px;
        transition: 0.2s;
      }

      .nav-btns:hover{
        color: rgb(0, 0, 0);
        background-color: rgb(255, 255, 255);
        box-shadow: 0 0 10px white, 0 0 40px white, 0 0 80px white;
        transition-delay: 0.1s;
      }

      .nav-btns span{
        position: absolute;
        display: block;
      }
      /* ----------FIN DISEÑO NAV BUTTONS---------- */

      /* ----------DISEÑO LOGIN/REGISTER BUTTONS---------- */
      .logreg-btn{
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: rgb(255, 255, 255);
        background-color: rgba(255, 255, 255, 0.048);
        text-transform: uppercase;
        letter-spacing: 2px;
        text-decoration: none;
        font-size: 15px;
        overflow: hidden;
        border-radius: 10px;
        transition: 0.2s;
        box-shadow: -1px -1px 1px 1px rgba(255, 255, 255, 0.527);
      }

      .logreg-btn:before{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 100%;
        background: rgba(255, 255, 255, 0.137);
      }

      .logreg-btn:after{
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.315));
        transition: 0.4s;
        transition-delay: 0.5s;
      }

      .logreg-btn:hover:after{
        left: 100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.315));
        transition: 0.5s;
        transition-delay: 0.5s;
      }

      .logreg-btn:hover{
        color: white;
      }

      .logreg-btn span{
        position: absolute;
        display: block;
        transition: 0.5s ease;
      }

      /* ANIMACIONES LOGREG BUTON */
      .logreg-btn span:nth-child(1){
        top: 0;
        left: 0;
        width: 0;
        height: 1px;
        background: #fff;
      }

      .logreg-btn:hover span:nth-child(1){
        width: 100%;
        transform: translateX(100%);
      }

      .logreg-btn span:nth-child(3){
        bottom: 0;
        right: 0;
        width: 0;
        height: 1px;
        background: #fff;
      }

      .logreg-btn:hover span:nth-child(3){
        width: 100%;
        transform: translateX(-100%);
      }

      .logreg-btn span:nth-child(2){
        top: 0;
        left: 0;
        width: 1px;
        height: 0;
        background: #fff;
      }

      .logreg-btn:hover span:nth-child(2){
        height: 100%;
        transform: translateY(100%);
      }

      .logreg-btn span:nth-child(4){
        bottom: 0;
        right: 0;
        width: 1px;
        height: 0;
        background: #fff;
      }

      .logreg-btn:hover span:nth-child(4){
        height: 100%;
        transform: translateY(-100%);
      }

      /* FIN ANIMACIONES LOGREG BUTON */

      /* ----------FIN DISEÑO NAV BUTTONS---------- */

    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
              <a href="" class="logo-btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                SecoSanchez
              </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                      <li class="nav-item">
                        <a href="" class="nav-btns">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          Dossier
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="" class="nav-btns">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          Tienda
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="" class="nav-btns">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          Contacto
                        </a>
                      </li>
                    </ul>
                    <div class="d-flex justify-content-between">
                      <li class="nav-item">
                        <a href="" class="logreg-btn">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          Login
                        </a>
                      </li>
                      

                      <li class="nav-item">
                        <a href="" class="logreg-btn">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          Registro
                        </a>
                      </li>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>
