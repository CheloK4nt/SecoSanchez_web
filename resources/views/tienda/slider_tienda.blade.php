
@php
    $i = 1;
    $i_string = strval($i);
    // dd($i_string); 
@endphp

{{-- CARRUSEL --}}
<div id="carouselExampleIndicators" class="carousel slide carousel-fade shadow" data-bs-ride="carousel">
    <div class="carousel-indicators">
        {{-- INDICADOR SLIDE PRINCIPAL --}}
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>
        {{-- FOR EACH INDICADORES SLIDES --}}
        @foreach ($slider as $slide)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i_string }}"></button>
            @php
                $i = $i + 1;
                $i_string = strval($i);
            @endphp
        @endforeach
    </div>


    <div class="carousel-inner">
        {{-- SLIDE PRINCIPAL --}}
        <div class="carousel-item active">
            <img src="{{ url('uploads/slides/slide_principal.jpg') }}" class="d-block w-100" alt="..." style="width: 100%;">
            <div class="carousel-caption d-none d-md-block">
                <div class="container container-slide-text shadow">
                    <h5>Tienda SecoSánchez</h5>
                    <p>Aprovecha esta oportunidad</p>
                </div>               
            </div>
        </div>

        {{-- FOR EACH SLIDES --}}
        @foreach ($slider as $slide)
            <div class="carousel-item">
                <img src="{{ url('uploads/slides/' . $slide->file_path_sli . '/' . $slide->file_name_sli) }}" class="d-block w-100" alt="..." style="width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                    <div class="container container-slide-text">
                        <h5> {{ $slide->nom_sli }} </h5>
                        <p> {{ $slide->sub_sli }} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- BOTONES NAVEGACION SLIDE --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="font-size: 50px">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="font-size: 50px">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>
{{-- FIN CARRUSEL --}}

{{-- {{ url('uploads/'.$slide->file_path_sli.'/'.$slide->file_name_sli) }} --}}
