<?php

namespace App\Http\Controllers\Admin;

use App\Producto;
use App\Categoria;
use App\Galeria;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    {

        // SE CREA PATH PARA IMAGENES
        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('img_prod')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img_prod')->getClientOriginalName()));
        $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
        $file_file = $upload_path.'/'.$path.'/'.$filename;
        // dd($file_file);

        $producto = new Producto();
        $producto->id_prod = $request->id_prod;
        $producto->nom_prod = $request->nom_prod;
        $producto->cat_prod = $request->cat_prod;
        $producto->file_path = date('Y-m-d');
        $producto->img_prod = $filename;
        $producto->precio_prod = $request->precio_prod;
        $producto->en_dcto_prod = $request->en_dcto_prod;
        $producto->dcto_prod = $request->dcto_prod;
        $producto->stock_prod = $request->stock_prod;
        $producto->crit_prod = $request->crit_prod;
        $producto->descr_prod = $request->descr_prod;
        $producto->estado_prod = $request->estado_prod;

        // dd($producto);

        $producto->save();

        if ($request->hasfile('img_prod')) {
            $fl = $request->img_prod->storeAs($path, $filename, 'uploads');
            $img = Image::make($file_file);
            $img->fit(256, 256, function($constraint){
                $constraint->upsize();
            });
            $img->save($upload_path.'/'.$path.'/t_'.$filename); 
        }

        return redirect()->route('admin.productos')->with('success',"Producto {$request->id_prod} CREADO exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto, $id)    {
        $producto = Producto::findOrFail($id);
        $producto->id_prod = $request->id_prod;
        $producto->nom_prod = $request->nom_prod;
        $producto->cat_prod = $request->cat_prod;

        $fp_borrar = $producto->file_path;
        $img_borrar = $producto->img_prod;
        $up_borrar = Config::get('filesystems.disks.uploads.root');


        if ($request->hasFile('img_prod')) {

            unlink($up_borrar.'/'.$fp_borrar.'/'.$img_borrar);
            unlink($up_borrar.'/'.$fp_borrar.'/t_'.$img_borrar);

            // SE CREA PATH PARA IMAGENES
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img_prod')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img_prod')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
            $file_file = $upload_path.'/'.$path.'/'.$filename;
            // dd($file_file);

            $producto->file_path = date('Y-m-d');
            $producto->img_prod = $filename;
        } 

        $producto->precio_prod = $request->precio_prod;
        $producto->en_dcto_prod = $request->en_dcto_prod;
        $producto->dcto_prod = $request->dcto_prod;
        $producto->stock_prod = $request->stock_prod;
        $producto->crit_prod = $request->crit_prod;
        $producto->descr_prod = $request->descr_prod;
        $producto->estado_prod = $request->estado_prod;

        // dd($request->img_prod);

        $producto->save();

        if ($request->hasfile('img_prod')) {
            $fl = $request->img_prod->storeAs($path, $filename, 'uploads');
            $img = Image::make($file_file);
            $img->fit(256, 256, function($constraint){
                $constraint->upsize();
            });
            $img->save($upload_path.'/'.$path.'/t_'.$filename);
        }

        $textColor = "red";


        return redirect()->route('admin.productos')->with('success',"Producto $request->id_prod MODIFICADO exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */

    public function destroy(Producto $producto, $id)    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        $id_prod = $producto->id_prod;
        return redirect()->route('admin.productos')->with('success',"Producto {$id_prod} ELIMINADO exitosamente");
    }

    public function getProductos(){
        $productos = Producto::with('categoria')->whereNull('deleted_at')->paginate(10);
        return view('admin.productos.home', compact('productos'));
    }

    public function getProductoAgregar(){

        $productos = DB::select('SELECT * FROM productos');
        $cantidad_productos = 0;

        foreach ($productos as $producto) {
            $cantidad_productos = $cantidad_productos + 1;
        }

        // Se genera el código de Producto //
        $valor_numerico = $cantidad_productos + 1;
        $id_producto = 'PRO';
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

        $id_producto = $id_producto . $parte_numerica . $valor_numerico;
        

        $categorias = DB::table('categorias')->select('*')
        ->whereNull('deleted_at')
        ->get();

        return view('admin.productos.agregar', compact('categorias','id_producto'));
    }

    public function getProductoEdit($id){
        $prod = Producto::findOrFail($id);
        $data = ['prod' => $prod];

        $categorias = DB::table('categorias')->select('*')
        ->whereNull('deleted_at')
        ->get();

        return view('admin.productos.edit', compact('prod', 'categorias'));
    }

    public function postProductoGaleriaAgregar($id, Request $request){

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
            $upload_path = Config::get('filesystems.disks.uploads.root');
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
                    $fl = $request->img_prod_gal->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->fit(256, 256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename); 
                }
                return redirect()->route('admin.productos')->with('success',"Galería de $id MODIFICADA exitosamente");
        } 
    }

    public function getProductoGaleriaEliminar($id, $gid){
        $g = Galeria::findOrFail($gid);
        $path = $g->file_path;
        $file = $g->file_name;
        $upload_path = Config::get('filesystems.disks.uploads.root');
        if($g->prod_id != $id){
            return redirect()->route('admin.productos')->with('danger',"La imagen no se puede eliminar");
        }else{
            if ($g->delete()) {
                unlink($upload_path.'/'.$path.'/'.$file);
                unlink($upload_path.'/'.$path.'/t_'.$file);
                return redirect()->route('admin.productos')->with('success',"IMAGEN BORRADA exitosamente");
            }
        }
    }
}
