<style>

	li{
        list-style-type: none;
        margin: 5px;
      }

  nav{
    display: flex;
    position: fixed !important;
    top: 0 !important;
    width: 100%;
    z-index: 999;
    margin-bottom: 10px;
    transition: 5s;
  }

	.navbar{
        background-color: rgb(0, 0, 0);
        /* position: sticky !important; */
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
        font-family: Impact;
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

      /* Linea derecha */
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
      /* fin linea derecha */

      
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
        font-family: 'Raleway', sans-serif;
      }

      .nav-btns:hover{
        color: rgb(0, 0, 0);
        background-color: rgb(255, 255, 255);
        box-shadow: 0 0 10px white, 0 0 40px white, 0 0 80px white;
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
        background-color: rgba(112, 112, 112, 0.089);
        text-transform: uppercase;
        letter-spacing: 2px;
        text-decoration: none;
        font-size: 15px;
        overflow: hidden;
        border-radius: 10px;
        transition: 0.2s;
        box-shadow: -1px -1px 1px 1px rgba(255, 255, 255, 0.404);
        font-family: 'Raleway', sans-serif;
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

      .vertical-center {
        padding: 10px;
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
      }

      /* FIN ANIMACIONES LOGREG BUTON */

      .nav-btns i{
        font-size: 20px;
      }

      /* ----------FIN DISEÑO NAV BUTTONS---------- */

      .dropdown{
          font-family: 'Raleway', sans-serif;
        }

        .dropdown:focus{
          color: white;
        }

        .dropdown:focus ::after{
          color: rgb(255, 255, 255);
        }

        .dropdown i{
          font-size: 20px;
          color: white;
        }

        .nav-btns:hover i{
          transition: 1s;
          color: rgb(0, 0, 0);
        }

        .dropdown a:focus{
          color: rgb(255, 255, 255);
        }

        .dropdown-item:hover{
          background-color: rgb(88, 88, 88);
          color: white;
        }

    .nav-btns:hover .tuerca{
      transform: rotate(-180deg) scale(130%) !important;
      transition: 0.2s;
    }

    .tuerca{
      transition: 0.2s;
    }

</style>