<?php

namespace App\Http\Controllers\Admin;

use App\Producto;
use App\Categoria;
use App\Galeria;
use App\Polera;
use App\Cuadro;
use App\Spray;
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

        return redirect()->route('polera.edit',$request->id_prod)->with('success',"Producto {$request->id_prod} CREADO exitosamente");
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
                return redirect()->back()->with('success',"Galería de $id MODIFICADA exitosamente");
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
                return redirect()->back()->with('success',"IMAGEN BORRADA exitosamente");
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


    // ==================== CUADROS ==================== //
    public function getProductosCuadros($status){
        switch ($status) {
            case 'p':
                $cuadros = DB::table('productos')->select('*')
                ->where('cat_prod', 'cuadro')
                ->where('estado_prod','P')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;
            
            case 'b':
                $cuadros = DB::table('productos')->select('*')
                ->where('cat_prod', 'cuadro')
                ->where('estado_prod','B')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;

            case 'all':
                $cuadros = DB::table('productos')->select('*')
                ->where('cat_prod', 'cuadro')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;

            case 'trash':
                $cuadros = DB::table('productos')->select('*')
                ->where('cat_prod', 'cuadro')
                ->whereNotNull('deleted_at')
                ->paginate(10);
                break;

            default:
                $cuadros = DB::table('productos')->select('*')
                ->where('cat_prod', 'cuadro')
                ->where('estado_prod','P')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;
        }
        // dd($status);

        return view('admin.productos.cuadros.home', compact('cuadros'));
    }

    public function postCuadroSearch(Request $request){
        $cuadros = DB::table('productos')->select('*')
        ->where('cat_prod', 'cuadro')
        ->where('nom_prod', 'LIKE', '%'.$request->input('search').'%')
        ->paginate(10);

        return view('admin.productos.cuadros.home', compact('cuadros'));
    }

    public function getCuadroAgregar(){

        $cuadros = DB::select('SELECT * FROM cuadros');
        $cantidad_cuadros = 0;

        foreach ($cuadros as $cuadro) {
            $cantidad_cuadros = $cantidad_cuadros + 1;
        }

        // Se genera el código de POLERA //
        $valor_numerico = $cantidad_cuadros + 1;
        $id_cuadro = 'CDR';
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

        $id_cuadro = $id_cuadro . $parte_numerica . $valor_numerico;

        return view('admin.productos.cuadros.agregar', compact('id_cuadro'));
    }

    public function cuadroStore(Request $request)    {

        // SE CREA PATH PARA IMAGENES
        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('img_prod')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.cuadros.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img_prod')->getClientOriginalName()));
        $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
        $file_file = $upload_path.'/'.$path.'/'.$filename;
        // dd($file_file);

        // STORE PRODUCTO
        $producto = new Producto();
        $producto->id_prod = $request->id_prod;
        $producto->nom_prod = $request->nom_prod;
        $producto->cat_prod = "cuadro";
        $producto->file_path = date('Y-m-d');
        $producto->img_prod = $filename;
        $producto->precio_prod = str_replace(".", "", $request->precio_prod);
        $producto->stock_prod = $request->total;
        $producto->crit_prod = $request->crit_prod;
        $producto->descr_prod = $request->descr_prod;
        $producto->estado_prod = $request->estado_prod;

        $cuadro = new Cuadro();
        $cuadro->id_cuadro = $request->id_prod;
        $cuadro->alto =$request->alto_cdr;
        $cuadro->ancho=$request->ancho_cdr;
        $cuadro->largo=$request->largo_cdr;

        if ($producto->save()) {
            // STORE POLERA
            $cuadro->save();
            if ($request->hasfile('img_prod')) {

                // guarda imagen original
                $fl = $request->img_prod->storeAs($path, $filename, 'cuadros');
                
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

        return redirect()->route('cuadro.edit',$request->id_prod)->with('success',"Producto {$request->id_prod} CREADO exitosamente");
    }

    public function getCuadroEdit($id){
        $prod = Producto::findOrFail($id);
        $cuadro = Cuadro::findOrFail($id);

        return view('admin.productos.cuadros.edit', compact('prod','cuadro'));
    }

    public function cuadroUpdate(Request $request, Producto $producto, Cuadro $cuadro, $id){
        $producto = Producto::findOrFail($id);
        $producto->nom_prod = $request->nom_prod;
        $producto->precio_prod = str_replace(".", "", $request->precio_prod);
        $producto->stock_prod = $request->total;
        $producto->crit_prod = $request->crit_prod;
        $producto->descr_prod = $request->descr_prod;
        $producto->estado_prod = $request->estado_prod;

        $cuadro = Cuadro::findOrFail($id);
        $cuadro->alto =$request->alto_cdr;
        $cuadro->ancho=$request->ancho_cdr;
        $cuadro->largo=$request->largo_cdr;

        $fp_borrar = $producto->file_path;
        $img_borrar = $producto->img_prod;
        $up_borrar = Config::get('filesystems.disks.cuadros.root');


        if ($request->hasFile('img_prod')) {

            // Se borran imagen original
            unlink($up_borrar.'/'.$fp_borrar.'/'.$img_borrar);
            unlink($up_borrar.'/'.$fp_borrar.'/t_'.$img_borrar);
            unlink($up_borrar.'/'.$fp_borrar.'/mt_'.$img_borrar);

            // SE CREA PATH PARA IMAGENES
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img_prod')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.cuadros.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img_prod')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
            $file_file = $upload_path.'/'.$path.'/'.$filename;

            $producto->file_path = date('Y-m-d');
            $producto->img_prod = $filename;
        } 

        $producto->save();

        if ($request->hasfile('img_prod')) {
            // guarda imagen original
            $fl = $request->img_prod->storeAs($path, $filename, 'cuadros');
                
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

        return redirect()->route('admin.productos.cuadros','p')->with('success',"Producto $request->id_prod MODIFICADO exitosamente");
    }

    public function postCuadroGaleriaAgregar($id, Request $request){

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
            $upload_path = Config::get('filesystems.disks.cuadros.root');
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
                    $fl = $request->img_prod_gal->storeAs($path, $filename, 'cuadros');
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
                return redirect()->back()->with('success',"Galería de $id MODIFICADA exitosamente");
        } 
    }

    public function getCuadroGaleriaEliminar($id, $gid){
        $g = Galeria::findOrFail($gid);
        $path = $g->file_path;
        $file = $g->file_name;
        $upload_path = Config::get('filesystems.disks.cuadros.root');
        if($g->prod_id != $id){
            return redirect()->route('admin.productos.cuadros')->with('danger',"La imagen no se puede eliminar");
        }else{
            if ($g->delete()) {
                unlink($upload_path.'/'.$path.'/'.$file);
                unlink($upload_path.'/'.$path.'/t_'.$file);
                unlink($upload_path.'/'.$path.'/mt_'.$file);
                return redirect()->back()->with('success',"IMAGEN BORRADA exitosamente");
            }
        }
    }

    public function destroyCuadro(Producto $producto, Cuadro $cuadro, $id){
        $producto = Producto::findOrFail($id);
        $cuadro = Cuadro::findOrFail($id);
        $producto->estado_prod = 'P';
        $producto->save();
        $producto->delete();
        $cuadro->delete();
        $id_prod = $producto->id_prod;
        return redirect()->route('admin.productos.cuadros','p')->with('success',"Producto {$id_prod} se ha enviado a la papelera");
    }

    public function getCuadroRestore(Producto $producto, Cuadro $cuadro, $id){
        $producto = Producto::onlyTrashed()->where('id_prod', $id)->first();
        $producto->restore();
        $cuadro = Cuadro::onlyTrashed()->where('id_cuadro', $id)->first();
        $cuadro->restore();
        $id_prod = $producto->id_prod;
        return redirect()->route('cuadro.edit',$id_prod)->with('success',"Producto {$id_prod} restaurado con éxito");
    }
    // ==================== FIN CUADROS ==================== //

    // ==================== SPRAYS ==================== //
    public function getProductosSprays($status){
        switch ($status) {
            case 'p':
                $sprays = DB::table('productos')->select('*')
                ->where('cat_prod', 'spray')
                ->where('estado_prod','P')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;
            
            case 'b':
                $sprays = DB::table('productos')->select('*')
                ->where('cat_prod', 'spray')
                ->where('estado_prod','B')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;

            case 'all':
                $sprays = DB::table('productos')->select('*')
                ->where('cat_prod', 'spray')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;

            case 'trash':
                $sprays = DB::table('productos')->select('*')
                ->where('cat_prod', 'spray')
                ->whereNotNull('deleted_at')
                ->paginate(10);
                break;

            default:
                $sprays = DB::table('productos')->select('*')
                ->where('cat_prod', 'spray')
                ->where('estado_prod','P')
                ->whereNull('deleted_at')
                ->paginate(10);
                break;
        }
        // dd($status);

        return view('admin.productos.sprays.home', compact('sprays'));
    }

    public function postSpraySearch(Request $request){
        $sprays = DB::table('productos')->select('*')
        ->where('cat_prod', 'spray')
        ->where('nom_prod', 'LIKE', '%'.$request->input('search').'%')
        ->paginate(10);

        return view('admin.productos.sprays.home', compact('sprays'));
    }

    public function getSprayAgregar(){

        $sprays = DB::select('SELECT * FROM sprays');
        $cantidad_sprays = 0;

        foreach ($sprays as $spray) {
            $cantidad_sprays = $cantidad_sprays + 1;
        }

        // Se genera el código de SPRAY //
        $valor_numerico = $cantidad_sprays + 1;
        $id_spray = 'SPR';
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

        $id_spray = $id_spray . $parte_numerica . $valor_numerico;

        return view('admin.productos.sprays.agregar', compact('id_spray'));
    }

    public function sprayStore(Request $request)    {

        // SE CREA PATH PARA IMAGENES
        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('img_prod')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.sprays.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img_prod')->getClientOriginalName()));
        $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
        $file_file = $upload_path.'/'.$path.'/'.$filename;
        // dd($file_file);

        // STORE PRODUCTO
        $producto = new Producto();
        $producto->id_prod = $request->id_prod;
        $producto->nom_prod = $request->nom_prod;
        $producto->cat_prod = "spray";
        $producto->file_path = date('Y-m-d');
        $producto->img_prod = $filename;
        $producto->precio_prod = str_replace(".", "", $request->precio_prod);
        $producto->stock_prod = $request->total;
        $producto->crit_prod = $request->crit_prod;
        $producto->descr_prod = $request->descr_prod;
        $producto->estado_prod = $request->estado_prod;

        $spray = new Spray();
        $spray->id_spray = $request->id_prod;
        $spray->marca =$request->marca_spr;
        $spray->cantidad=$request->cantidad_spr;
        $spray->color=$request->color_spr;

        if ($producto->save()) {
            // STORE SPRAY
            $spray->save();
            if ($request->hasfile('img_prod')) {

                // guarda imagen original
                $fl = $request->img_prod->storeAs($path, $filename, 'sprays');
                
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

        return redirect()->route('spray.edit',$request->id_prod)->with('success',"Producto {$request->id_prod} CREADO exitosamente");
    }

    public function getSprayEdit($id){
        $prod = Producto::findOrFail($id);
        $spray = Spray::findOrFail($id);

        return view('admin.productos.sprays.edit', compact('prod','spray'));
    }

    public function sprayUpdate(Request $request, Producto $producto, Spray $spray, $id){
        $producto = Producto::findOrFail($id);
        $producto->nom_prod = $request->nom_prod;
        $producto->precio_prod = str_replace(".", "", $request->precio_prod);
        $producto->stock_prod = $request->total;
        $producto->crit_prod = $request->crit_prod;
        $producto->descr_prod = $request->descr_prod;
        $producto->estado_prod = $request->estado_prod;

        $spray = Spray::findOrFail($id);
        $spray->marca =$request->marca_spr;
        $spray->cantidad=$request->cantidad_spr;
        $spray->color=$request->color_spr;

        $fp_borrar = $producto->file_path;
        $img_borrar = $producto->img_prod;
        $up_borrar = Config::get('filesystems.disks.sprays.root');


        if ($request->hasFile('img_prod')) {

            // Se borran imagen original
            unlink($up_borrar.'/'.$fp_borrar.'/'.$img_borrar);
            unlink($up_borrar.'/'.$fp_borrar.'/t_'.$img_borrar);
            unlink($up_borrar.'/'.$fp_borrar.'/mt_'.$img_borrar);

            // SE CREA PATH PARA IMAGENES
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img_prod')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.sprays.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img_prod')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
            $file_file = $upload_path.'/'.$path.'/'.$filename;

            $producto->file_path = date('Y-m-d');
            $producto->img_prod = $filename;
        } 

        $producto->save();

        if ($request->hasfile('img_prod')) {
            // guarda imagen original
            $fl = $request->img_prod->storeAs($path, $filename, 'sprays');
                
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

        return redirect()->route('admin.productos.sprays','p')->with('success',"Producto $request->id_prod MODIFICADO exitosamente");
    }

    public function postSprayGaleriaAgregar($id, Request $request){

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
            $upload_path = Config::get('filesystems.disks.sprays.root');
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
                    $fl = $request->img_prod_gal->storeAs($path, $filename, 'sprays');
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
                return redirect()->back()->with('success',"Galería de $id MODIFICADA exitosamente");
        } 
    }

    public function getSprayGaleriaEliminar($id, $gid){
        $g = Galeria::findOrFail($gid);
        $path = $g->file_path;
        $file = $g->file_name;
        $upload_path = Config::get('filesystems.disks.sprays.root');
        if($g->prod_id != $id){
            return redirect()->route('admin.productos.sprays')->with('danger',"La imagen no se puede eliminar");
        }else{
            if ($g->delete()) {
                unlink($upload_path.'/'.$path.'/'.$file);
                unlink($upload_path.'/'.$path.'/t_'.$file);
                unlink($upload_path.'/'.$path.'/mt_'.$file);
                return redirect()->back()->with('success',"IMAGEN BORRADA exitosamente");
            }
        }
    }

    public function destroySpray(Producto $producto, Spray $spray, $id){
        $producto = Producto::findOrFail($id);
        $spray = Spray::findOrFail($id);
        $producto->estado_prod = 'P';
        $producto->save();
        $producto->delete();
        $spray->delete();
        $id_prod = $producto->id_prod;
        return redirect()->route('admin.productos.sprays','p')->with('success',"Producto {$id_prod} se ha enviado a la papelera");
    }

    public function getSprayRestore(Producto $producto, Spray $spray, $id){
        $producto = Producto::onlyTrashed()->where('id_prod', $id)->first();
        $producto->restore();
        $spray = Spray::onlyTrashed()->where('id_spray', $id)->first();
        $spray->restore();
        $id_prod = $producto->id_prod;
        return redirect()->route('spray.edit',$id_prod)->with('success',"Producto {$id_prod} restaurado con éxito");
    }
    // ==================== FIN SPRAYS ==================== //
    
}
