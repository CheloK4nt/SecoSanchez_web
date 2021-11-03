<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ApiJsController extends Controller
{
    function getProductsSection($section, Request $request){
        switch ($section) {
            case 'tienda':
                $productos = Producto::where('estado_prod','P')->inRandomOrder()->paginate(15);
                break;
            
            default:
                $productos = Producto::where('estado_prod','P')->inRandomOrder()->paginate(15);
                break;
        }

        return $productos;
    }
}
