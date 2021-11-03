<style>
    .loader{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100vh;
        background-color: rgba(255, 255, 255, 0.904);
        position: fixed;
        top: 0px;
        left: 0px;
        z-index: 1000;
        }
        .loader .box{
            display: block;
            width: 120px;
            }
            .loader .box .pre-logo{
                width: 80%;
                }
                .loader .box .pre-logo img{
                    display: block;
                    width: 150%;
                }

        .rotate{
            -webkit-animation: spin 5s linear infinite;
            -moz-animation: spin 5s linear infinite;
            animation: spin 5s linear infinite;
        }

        /* keyframes */

        @-webkit-keyframes spin{
            100%{-webkit-transform: rotate(360deg);}
        }
        @-moz-keyframes spin{
            100%{-webkit-transform: rotate(360deg);}
        }
        @keyframes spin{
            100%{-webkit-transform: rotate(360deg);}
        }

    .load img{
    }
</style>

{{-- <img class="rotate" src="/img/login/blessedhands.png" alt=""> --}}

<div class="loader" id="loader" name="loader">
    <div class="box">
        <div class="load">
            <img src="/img/loader.svg" alt="">
        </div>
        <div class="pre-logo">
            <img class="rotate" src="/img/login/blessedhands.png" alt="">
        </div>
        <div class="load">
            <img src="/img/loader.svg" alt="">
        </div>
    </div>
</div>