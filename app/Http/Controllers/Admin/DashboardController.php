<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usuario;
use App\Producto;

class DashboardController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getDashboard(){
        $usuarios = Usuario::count();
        $productos = Producto::where('estado_prod', 'P')->count();
        $data = ['usuarios' => $usuarios, 'productos' => $productos];
        return view('admin.dashboard', $data);
    }

    public function getCategoriaAgregar(){
        return view('admin.categorias.home');
    }
}
