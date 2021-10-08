<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->id_cat = $request->id_cat;
        $categoria->nom_cat = $request->nom_cat;

        $categoria->save();
        return back()->with('success',"Categoría {$request->id_cat} CREADA exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->nom_cat = $request->nom_cat;
        $id_cat = $categoria->id_cat;
        $nom_cat = $categoria->nom_cat;
        $categoria->save();
        return redirect()->route('admin.categorias')->with('success',"Categoría {$id_cat} MODIFICADA exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        $id_cat = $categoria->id_cat;
        return redirect()->route('admin.categorias')->with('success',"Categoría {$id_cat} ELIMINADA exitosamente");
    }

    public function getCategorias(){

        $categorias = DB::select('SELECT * FROM categorias');
        $cantidad_categorias = 0;

        foreach ($categorias as $categoria) {
            $cantidad_categorias = $cantidad_categorias + 1;
        }

        // Se genera el código de Categoría //
        $valor_numerico = $cantidad_categorias + 1;
        $id_categoria = 'CAT';
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

        $id_categoria = $id_categoria . $parte_numerica . $valor_numerico;

        $categorias = DB::table('categorias')->select('*')
        ->whereNull('deleted_at')
        ->get();
        // dd($categorias);


        return view('admin.categorias.home',compact('id_categoria', 'categorias'));

    }

    public function getCategoriaEdit($id){
        $cat = Categoria::findOrFail($id);
        $data = ['cat' => $cat];
        $id_categoria = $cat -> id_cat;
        $nom_categoria = $cat -> nom_cat;
        // dd($nom_categoria);

        return view('admin.categorias.edit', $data);
    }
}
