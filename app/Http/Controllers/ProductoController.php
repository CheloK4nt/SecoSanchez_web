<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\DB;
use App\Producto;
use App\Polera;
use App\Cuadro;
use App\Spray;
use App\Favorito;

class ProductoController extends Controller
{
    public function getProducto($id){
        $producto = Producto::findOrFail($id);
        // dd($producto);

        // buscar favorito
        if (Auth::user()) {
            $favorito = Favorito::where('producto_id', $id)->where('usuario_email', Auth::user()->email)->get();
            // dd($favorito);
            if ($producto->cat_prod == "polera") {
                $polera = Polera::findOrFail($id);
                $data = ['producto' => $producto, 'polera' => $polera, 'favorito' => $favorito];
            }else if($producto->cat_prod == "cuadro"){
                $cuadro = Cuadro::findOrFail($id);
                $data = ['producto' => $producto, 'cuadro' => $cuadro, 'favorito' => $favorito];
            }else if($producto->cat_prod == "spray"){
                $spray = Spray::findOrFail($id);
                $data = ['producto' => $producto, 'spray' => $spray, 'favorito' => $favorito];
            }
        }else {
            if ($producto->cat_prod == "polera") {
                $polera = Polera::findOrFail($id);
                $data = ['producto' => $producto, 'polera' => $polera];
            }else if($producto->cat_prod == "cuadro"){
                $cuadro = Cuadro::findOrFail($id);
                $data = ['producto' => $producto, 'cuadro' => $cuadro];
            }else if($producto->cat_prod == "spray"){
                $spray = Spray::findOrFail($id);
                $data = ['producto' => $producto, 'spray' => $spray];
            } 
        }

        
        
        
        return view('producto.producto_single', $data);
    }
}
