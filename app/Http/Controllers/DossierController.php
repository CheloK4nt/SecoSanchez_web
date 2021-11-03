<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Dossier;
use App\Http\Controllers\Controller;

class DossierController extends Controller
{

    /* public function index(){
        return view('home.dossier');
    } */

    public function index(){

        /* $dossier = DB::table('dossier')->select('*')->paginate(10); */
        $dossier = DB::table('dossier')->get()/* ->paginate(10) */;
        /* dd($productos); */
        return view('home.dossier', compact(['dossier']));
    }
}