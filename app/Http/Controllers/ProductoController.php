<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Polera;
use App\Cuadro;
use App\Spray;

class ProductoController extends Controller
{
    public function getProducto($id){
        $producto = Producto::findOrFail($id);
        if ($producto->cat_prod == "polera") {
            $polera = Polera::findOrFail($id);
            $data = ['producto' => $producto, 'polera' => $polera];
        }else if ($producto->cat_prod == "cuadro") {
            $cuadro = Cuadro::findOrFail($id);
            $data = ['producto' => $producto, 'cuadro' => $cuadro];
        }else if ($producto->cat_prod == "spray") {
            $spray = Spray::findOrFail($id);
            $data = ['producto' => $producto, 'spray' => $spray];
        }
        return view('producto.producto_single', $data);
    }
}
