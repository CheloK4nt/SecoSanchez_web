<?php

namespace App\Http\Controllers\Admin;

use App\Dossier;
use Illuminate\Http\Request;
use App\Galeria;
Use Str, Config, Image;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DossierController extends Controller
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
        $fileExt = trim($request->file('img_dossier')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img_dossier')->getClientOriginalName()));
        $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
        $file_file = $upload_path.'/'.$path.'/'.$filename;

        $dossier = new Dossier();
        $dossier->id_dossier = $request->id_dossier;
        /* $dossier->nom_dossier = $request->nom_dossier; */
        $dossier->file_path = date('Y-m-d');
        $dossier->img_dossier = $filename;
        /* $dossier->texto_dossier = $request->texto_dossier; */

        $dossier->save();

        if ($request->hasfile('img_dossier')) {
            $fl = $request->img_dossier->storeAs($path, $filename, 'uploads');
            $img = Image::make($file_file);
            /* $img->fit(500, 500, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($upload_path.'/'.$path.'/t_'.$filename); 
        }

        return redirect()->route('admin.dossier')->with('success',"Publicación {$request->id_dossier} CREADA exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossier $dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dossier $dossier, $id)    {
        $dossier = Dossier::findOrFail($id);
        $dossier->id_dossier = $request->id_dossier;
        /* $dossier->nom_dossier = $request->nom_dossier; */

        $fp_borrar = $dossier->file_path;
        $img_borrar = $dossier->img_dossier;
        $up_borrar = Config::get('filesystems.disks.uploads.root');


        if ($request->hasFile('img_dossier')) {

            unlink($up_borrar.'/'.$fp_borrar.'/'.$img_borrar);
            unlink($up_borrar.'/'.$fp_borrar.'/t_'.$img_borrar);

            // SE CREA PATH PARA IMAGENES
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img_dossier')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img_dossier')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
            $file_file = $upload_path.'/'.$path.'/'.$filename;
            
            $dossier->file_path = date('Y-m-d');
            $dossier->img_dossier = $filename;
        } 
        /* $dossier->texto_dossier = $request->texto_dossier; */

        $dossier->save();

        if ($request->hasfile('img_dossier')) {
            $fl = $request->img_dossier->storeAs($path, $filename, 'uploads');
            $img = Image::make($file_file);
            /* $img->fit(256, 256, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($upload_path.'/'.$path.'/t_'.$filename);
        }

        $textColor = "red";


        return redirect()->route('admin.dossier')->with('success',"Publicación $request->id_dossier MODIFICADO exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossier $dossier, $id)
    {
        $dossier = Dossier::findOrFail($id);
        $dossier->save();
        $dossier->delete();
        $id_dossier = $dossier->id_dossier;
        return redirect()->route('admin.dossier')->with('success',"Publicación {$id_dossier} se eliminado");
    }

    public function getDossier(){

        /* $dossier = DB::table('dossier')->select('*')->paginate(10); */
        /* $dossier = DB::table('dossier')->paginate(7); */
        /* dd($productos); */
        /* return view('admin.dossier.home', compact(['dossier'])); */

        $dossier = DB::select('SELECT * FROM dossier');
        $cantidad_dossier = 0;

        foreach ($dossier as $dossi) {
            $cantidad_dossier = $cantidad_dossier + 1;
        }

        // Se genera el código de Categoría //
        $valor_numerico = $cantidad_dossier + 1;
        $id_dossier = 'DSR';
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

        $id_dossier = $id_dossier . $parte_numerica . $valor_numerico;

        $dossier = DB::table('dossier')->select('*')
        ->whereNull('deleted_at')
        ->paginate(5);
        // dd($categorias);


        return view('admin.dossier.home',compact('id_dossier', 'dossier'));
    }

    public function getDossierAgregar(){

        $dossier = DB::select('SELECT * FROM dossier');
        $cantidad_productos = 0;

        foreach ($dossier as $dossi) {
            $cantidad_productos = $cantidad_productos + 1;
        }

        // Se genera el código de Producto //
        $valor_numerico = $cantidad_productos + 1;
        /* $id_dossier = 'PRO'; */
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

        $id_dossier = $parte_numerica . $valor_numerico;

        return view('admin.dossier.agregar', compact('id_dossier'));
    }

    public function getDossierEdit($id){
        $dossi = Dossier::findOrFail($id);
        $data = ['dossi' => $dossi];
        return view('admin.dossier.edit', compact('dossi'));
    }

    public function postDossierGaleriaAgregar($id, Request $request){

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

        if ($request->hasFile('img_dossi_gal')) {

            // SE CREA PATH PARA IMAGENES
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img_dossi_gal')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img_dossi_gal')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
        
            $file_file = $upload_path.'/'.$path.'/'.$filename;

            $g = new Galeria;
            $g->id_gal = $id_galeria;
            $g->prod_id = $id;
            $g->file_path = date('Y-m-d');
            $g->file_name = $filename;

            $g->save();
                if ($request->hasfile('img_dossi_gal')) {
                    $fl = $request->img_dossi_gal->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    $img->save($upload_path.'/'.$path.'/t_'.$filename); 
                }
                return redirect()->route('admin.dossier.home')->with('success',"Galería de $id MODIFICADA exitosamente");
        } 
    }

    public function getDossierGaleriaEliminar($id, $gid){
        $g = Galeria::findOrFail($gid);
        $path = $g->file_path;
        $file = $g->file_name;
        $upload_path = Config::get('filesystems.disks.uploads.root');
        if($g->dossi_id != $id){
            return redirect()->route('admin.dossier')->with('danger',"La imagen no se puede eliminar");
        }else{
            if ($g->delete()) {
                unlink($upload_path.'/'.$path.'/'.$file);
                unlink($upload_path.'/'.$path.'/t_'.$file);
                return redirect()->route('admin.dossier.home')->with('success',"IMAGEN BORRADA exitosamente");
            }
        }
    }
}
