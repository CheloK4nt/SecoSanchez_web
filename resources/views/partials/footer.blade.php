<style>

    footer{
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgb(0, 0, 0);
        height: auto;
        width: 100%;
    }

    .footer-content{
        display: flex;
        align-items: center;
        flex-direction: column;
        text-align: center;
    }

    .redes-sociales{
        list-style: none;
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-evenly;
    }


    .footer-btn{
        position: relative;
        width: 50px;
        height: 50px;
        margin: 0 auto;
    }

    i{
        position: relative;
        transform: translate(-50%, -50%);
        font-size: 20px;
        z-index: 10;
        color: rgb(0, 0, 0);
        border: 2px;
    }

    /* img{
        width: 50px;
        transform: scale(1.2);
        position: relative;
        transform: translate(-50%, -50%);
        z-index: 10;
        border: 2px;
    } */

    .blurred{
        position: absolute;
        bottom: -3px;
        left: -25px;
        width: 50px;
        height: 50px;
        border-radius: 100%;
        filter: url(#goo);
        border: 2px;
        border-color: black;
    }

    .blurred::before{
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgb(184, 184, 184);
        border-radius: 100%;
        transition: 1.6s;
    }

    .blurred::after{
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgb(184, 184, 184);
        border-radius: 100%;
        transition: 0.6s;
    }

    .blurred > span:nth-of-type(1),
    .blurred > span:nth-of-type(2){
        position: absolute;
        width: 50px;
        height: 50px;
        top: 0;
        left: 0;
        background-color: rgb(184, 184, 184);
        border-radius: 100%;
        transition: .2s;
        border-color: black;
    }

    .footer-btn:hover .blurred::before{
        width: 40px;
        height: 40px;
        top: 50%;
        left: 50%;
    }

    .footer-btn:hover .blurred::after{
        width: 15px;
        height: 15px;
        top: 30px;
        left: 45px;
        background-color: rgb(184, 184, 184);
    }

    .footer-btn:hover .blurred > span:nth-of-type(1){
        width: 30px;
        height: 30px;
        top: -10px;
        left: -20px;
    }

    .footer-btn:hover .blurred > span:nth-of-type(2){
        width: 25px;
        height: 25px;
        top: 40px;
        left: -20px;
    }

    .img-firma{
                background-color: rgb(216, 17, 17); 
                transform: translate(100%);
            }

</style>

<footer>
    <div class="footer-content">
        <ul class="redes-sociales">
            <li>
                <a href="https://www.facebook.com/SecoSanchez" class="footer-btn">
                    <i class="fa fa-facebook"></i>
                    <div class="blurred">
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="https://www.youtube.com/channel/UC0THqp3KZJhqjVRHiz3978Q/featured" class="footer-btn">
                    <i class="fa fa-youtube"></i>
                    <div class="blurred">
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/seco_sanchez/?hl=es-la" class="footer-btn">
                    <i class="fab fa-instagram-square"></i>
                    <div class="blurred" style="border-color: black">
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>
        </ul>
        {{-- <img src="/img/homepage/firma_seco.png" class="img-firma" alt="" width="200px;"> --}}
    </div>
    
</footer>

