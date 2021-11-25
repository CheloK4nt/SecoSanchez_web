<style>
    .idioma-dropdown {
        display: flex;
        position: fixed;
        right: 20px;
        top: 100px;
        text-align: end;
        z-index: 999;
    }

    .dropdown-menu{
        box-shadow: 2px 2px 5px black;
    }

    .dropdown-toggle{
        border: 1px solid white;
        background-color: rgb(41, 41, 41);
        box-shadow: 2px 2px 5px black;
    }

    .dropdown-toggle:focus{
        background-color: rgb(124, 124, 124) !important;
        box-shadow: 2px 2px 5px rgb(255, 255, 255);
    }

    .dropdown-toggle:hover{
        background-color: rgb(255, 255, 255);
        box-shadow: 2px 2px 5px black;
        color: black;
    }
</style>

<div class="dropdown idioma-dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    {{ __('messages.idiomas') }}
    </a>    
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li><a class="dropdown-item" href="{{ url('locale/es') }}">Español</a></li>
        <li><a class="dropdown-item" href="{{ url('locale/en') }}">Inglés</a></li>
    </ul>
</div>