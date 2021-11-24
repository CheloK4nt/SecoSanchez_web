<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class TiendaController extends Controller
{
    public function getTienda(){
        $slider = Slider::orderBy('id_sli', 'Asc')->where('estado_sli', '1')->get();
        $data = ['slider' => $slider];
        return view('tienda.tienda', $data);
    }

    public function getTiendaCuadros(){
        // $slider = Slider::orderBy('id_sli', 'Asc')->where('estado_sli', '1')->get();
        // $data = ['slider' => $slider];
        return view('tienda.cuadros');
    }

    public function getTiendaPoleras(){
        // $slider = Slider::orderBy('id_sli', 'Asc')->where('estado_sli', '1')->get();
        // $data = ['slider' => $slider];
        return view('tienda.poleras');
    }

    public function getTiendaSprays(){
        // $slider = Slider::orderBy('id_sli', 'Asc')->where('estado_sli', '1')->get();
        // $data = ['slider' => $slider];
        return view('tienda.sprays');
    }
}
