<?php

namespace App\Http\Controllers\Admin;

use App\Producto;
use App\Categoria;
use App\Galeria;
use App\Polera;
Use Str, Config, Image;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductoController extends Controller

{

    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getMenuProductos(){
        return view('admin.productos.menu');
    }

    // ==================== POLERAS ==================== //
    public function getProductosPoleras($status){
        switch ($status) {
            case 'p':
                $poleras = DB::table('productos')->select('*')
                ->where('cat_prod', 'polera')
                ->where('estado_prod','P')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;
            
            case 'b':
                $poleras = DB::table('productos')->select('*')
                ->where('cat_prod', 'polera')
                ->where('estado_prod','B')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;

            case 'all':
                $poleras = DB::table('productos')->select('*')
                ->where('cat_prod', 'polera')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;

            case 'trash':
                $poleras = DB::table('productos')->select('*')
                ->where('cat_prod', 'polera')
                ->whereNotNull('deleted_at')
                ->paginate(10);
                break;

            default:
                $poleras = DB::table('productos')->select('*')
                ->where('cat_prod', 'polera')
                ->where('estado_prod','P')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;
        }
        // dd($status);

        return view('admin.productos.poleras.home', compact('poleras'));
    }

    public function postPoleraSearch(Request $request){
        $poleras = DB::table('productos')->select('*')
        ->where('cat_prod', 'polera')
        ->where('nom_prod', 'LIKE', '%'.$request->input('search').'%')
        ->paginate(10);

        return view('admin.productos.poleras.home', compact('poleras'));
    }

    public function getPoleraAgregar(){

        $poleras = DB::select('SELECT * FROM poleras');
        $cantidad_poleras = 0;

        foreach ($poleras as $polera) {
            $cantidad_poleras = $cantidad_poleras + 1;
        }

        // Se genera el código de POLERA //
        $valor_numerico = $cantidad_poleras + 1;
        $id_polera = 'PLR';
        $parte_numerica = '';

        if ($valor_numerico < 10){
            $parte_numerica = '00';
        }
        if ($valor_numerico > 9 && $valor_numerico < 100){
            $parte_numerica = '0';
        }
        if ($valor_numerico > 99) {
            $parte_numerica = '';
        }

        $id_polera = $id_polera . $parte_numerica . $valor_numerico;

        return view('admin.productos.poleras.agregar', compact('id_polera'));
    }

    public function poleraStore(Request $request)    {

        // SE CREA PATH PARA IMAGENES
        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('img_prod')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.poleras.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img_prod')->getClientOriginalName()));
        $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
        $file_file = $upload_path.'/'.$path.'/'.$filename;
        // dd($file_file);

        // STORE PRODUCTO
        $producto = new Producto();
        $producto->id_prod = $request->id_prod;
        $producto->nom_prod = $request->nom_prod;
        $producto->cat_prod = "polera";
        $producto->file_path = date('Y-m-d');
        $producto->img_prod = $filename;
        $producto->precio_prod = str_replace(".", "", $request->precio_prod);
        $producto->stock_prod = $request->total;
        $producto->crit_prod = $request->crit_prod;
        $producto->descr_prod = $request->descr_prod;
        $producto->estado_prod = $request->estado_prod;

        $polera = new Polera();
        $polera->id_polera = $request->id_prod;
        $polera->s = $request->s_plr;
        $polera->m = $request->m_plr;
        $polera->l = $request->l_plr;
        $polera->xl = $request->xl_plr;
        $polera->xxl = $request->xxl_plr;



        if ($producto->save()) {
            // STORE POLERA
            $polera->save();
            if ($request->hasfile('img_prod')) {

                // guarda imagen original
                $fl = $request->img_prod->storeAs($path, $filename, 'poleras');
                
                // guarda imagen t_
                $img = Image::make($file_file);
                $img->fit(256, 256, function($constraint){
                    $constraint->upsize();
                });  
                $img->save($upload_path.'/'.$path.'/t_'.$filename); 

                // guarda imagen mt_
                $img = Image::make($file_file);
                $img->fit(64, 64, function($constraint){
                    $constraint->upsize();
                });
                $img->save($upload_path.'/'.$path.'/mt_'.$filename); 
            }
        }

        return redirect()->route('admin.productos.poleras','p')->with('success',"Producto {$request->id_prod} CREADO exitosamente");
    }

    public function getPoleraEdit($id){
        $prod = Producto::findOrFail($id);
        $polera = Polera::findOrFail($id);

        return view('admin.productos.poleras.edit', compact('prod','polera'));
    }

    public function poleraUpdate(Request $request, Producto $producto, Polera $polera, $id){
        $producto = Producto::findOrFail($id);
        $producto->nom_prod = $request->nom_prod;
        $producto->precio_prod = str_replace(".", "", $request->precio_prod);
        $producto->stock_prod = $request->total;
        $producto->crit_prod = $request->crit_prod;
        $producto->descr_prod = $request->descr_prod;
        $producto->estado_prod = $request->estado_prod;

        $polera = Polera::findOrFail($id);
        $polera->s = $request->s_plr;
        $polera->m = $request->m_plr;
        $polera->l = $request->l_plr;
        $polera->xl = $request->xl_plr;
        $polera->xxl = $request->xxl_plr;

        $fp_borrar = $producto->file_path;
        $img_borrar = $producto->img_prod;
        $up_borrar = Config::get('filesystems.disks.poleras.root');


        if ($request->hasFile('img_prod')) {

            // Se borran imagen original
            unlink($up_borrar.'/'.$fp_borrar.'/'.$img_borrar);
            unlink($up_borrar.'/'.$fp_borrar.'/t_'.$img_borrar);
            unlink($up_borrar.'/'.$fp_borrar.'/mt_'.$img_borrar);

            // SE CREA PATH PARA IMAGENES
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img_prod')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.poleras.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img_prod')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
            $file_file = $upload_path.'/'.$path.'/'.$filename;

            $producto->file_path = date('Y-m-d');
            $producto->img_prod = $filename;
        } 

        $producto->save();
        $polera->save();

        if ($request->hasfile('img_prod')) {
            // guarda imagen original
            $fl = $request->img_prod->storeAs($path, $filename, 'poleras');
                
            // guarda imagen t_
            $img = Image::make($file_file);
            $img->fit(256, 256, function($constraint){
                $constraint->upsize();
            });  
            $img->save($upload_path.'/'.$path.'/t_'.$filename); 

            // guarda imagen mt_
            $img = Image::make($file_file);
            $img->fit(64, 64, function($constraint){
                $constraint->upsize();
            });
            $img->save($upload_path.'/'.$path.'/mt_'.$filename);
        }

        return redirect()->route('admin.productos.poleras','p')->with('success',"Producto $request->id_prod MODIFICADO exitosamente");
    }

    public function postPoleraGaleriaAgregar($id, Request $request){

        $galerias = DB::select('SELECT * FROM galerias');
        $cantidad_galerias = 0;

        foreach ($galerias as $galeria) {
            $cantidad_galerias = $cantidad_galerias + 1;
        }

        // Se genera el código de Galeria //
        $valor_numerico = $cantidad_galerias + 1;
        $id_galeria = 'GAL';
        $parte_numerica = '';

        if ($valor_numerico < 10){
            $parte_numerica = '00';
        }
        if ($valor_numerico > 9 && $valor_numerico < 100){
            $parte_numerica = '0';
        }
        if ($valor_numerico > 99) {
            $parte_numerica = '';
        }

        $id_galeria = $id_galeria . $parte_numerica . $valor_numerico;

        if ($request->hasFile('img_prod_gal')) {

            // SE CREA PATH PARA IMAGENES
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img_prod_gal')->getClientOriginalExtension());
            // dd($fileExt);
            $upload_path = Config::get('filesystems.disks.poleras.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img_prod_gal')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            // dd($filename);
        
            $file_file = $upload_path.'/'.$path.'/'.$filename;
            // dd($file_file);

            $g = new Galeria;
            $g->id_gal = $id_galeria;
            $g->prod_id = $id;
            $g->file_path = date('Y-m-d');
            $g->file_name = $filename;
            // dd($filename);

            $g->save();
                if ($request->hasfile('img_prod_gal')) {
                    $fl = $request->img_prod_gal->storeAs($path, $filename, 'poleras');
                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename); 

                    $img = Image::make($file_file);
                    $img->fit(64, 64, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/mt_'.$filename); 
                }
                return redirect()->route('admin.productos.poleras','p')->with('success',"Galería de $id MODIFICADA exitosamente");
        } 
    }

    public function getPoleraGaleriaEliminar($id, $gid){
        $g = Galeria::findOrFail($gid);
        $path = $g->file_path;
        $file = $g->file_name;
        $upload_path = Config::get('filesystems.disks.poleras.root');
        if($g->prod_id != $id){
            return redirect()->route('admin.productos.poleras')->with('danger',"La imagen no se puede eliminar");
        }else{
            if ($g->delete()) {
                unlink($upload_path.'/'.$path.'/'.$file);
                unlink($upload_path.'/'.$path.'/t_'.$file);
                unlink($upload_path.'/'.$path.'/mt_'.$file);
                return redirect()->route('admin.productos.poleras','p')->with('success',"IMAGEN BORRADA exitosamente");
            }
        }
    }

    public function destroyPolera(Producto $producto, Polera $polera, $id){
        $producto = Producto::findOrFail($id);
        $polera = Polera::findOrFail($id);
        $producto->estado_prod = 'P';
        $producto->save();
        $producto->delete();
        $polera->delete();
        $id_prod = $producto->id_prod;
        return redirect()->route('admin.productos.poleras','p')->with('success',"Producto {$id_prod} se ha enviado a la papelera");
    }

    public function getPoleraRestore(Producto $producto, Polera $polera, $id){
        $producto = Producto::onlyTrashed()->where('id_prod', $id)->first();
        $producto->restore();
        $polera = Polera::onlyTrashed()->where('id_polera', $id)->first();
        $polera->restore();
        $id_prod = $producto->id_prod;
        return redirect()->route('polera.edit',$id_prod)->with('success',"Producto {$id_prod} restaurado con éxito");
    }
    // ==================== FIN POLERAS ==================== //



    
}
