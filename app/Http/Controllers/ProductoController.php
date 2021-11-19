<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Polera;

class ProductoController extends Controller
{
    public function getProducto($id){
        $producto = Producto::findOrFail($id);
        if ($producto->cat_prod == "polera") {
            $polera = Polera::findOrFail($id);
            $data = ['producto' => $producto, 'polera' => $polera];
        }   
        
        return view('producto.producto_single', $data);
    }
}
