<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Slider;

class ContentController extends Controller
{
    public function getTienda(){
        $categorias = Categoria::orderBy('nom_cat', 'Asc')->get();
        $slider = Slider::orderBy('id_sli', 'Asc')->where('estado_sli', '1')->get();
        $data = ['categorias' => $categorias, 'slider' => $slider];
        return view('tienda.tienda', $data);
    }

    /* public function getDossier(){
        return view('dossier.dossier');
    } */
}
