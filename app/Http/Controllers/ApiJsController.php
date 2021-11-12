<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Favorito;

class ApiJsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['getProductsSection']);
    }

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

    function postFavoriteAdd($producto, Request $request){
        $query = Favorito::where('usuario_email', Auth::user()->email)->where('producto_id', $producto)->count();
        if($query > 0):
            $data = ['status' => "error", 'msg' => 'ya se encuentra en favorito'];
        else:
            $favorito = new Favorito;
            $favorito->usuario_email = Auth::user()->email;
            $favorito->producto_id = $producto;
            if($favorito->save()):
                $data = ['status' => "success", 'msg' => 'se guardo su favorito'];          
            endif;
        endif;
        return response()->json($data);        
    }

    public function postUserFavorites(Request $request){
        $productos = json_decode($request->input('productos'),true);
        $query = Favorito::where('usuario_email', Auth::user()->email)->whereIn('producto_id', explode(",",$request->input('productos')))->pluck('producto_id');
        if(count(collect($query)) > 0):
            $data = ['status' => "success", 'count' => count(collect($query)), 'productos' => $query];
        else:
            $data = ['status' => "success", 'count' => count(collect($query))];
        endif;
        return response()->json($data);
    }
}
