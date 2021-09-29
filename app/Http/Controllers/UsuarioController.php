<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Validator;

class UsuarioController extends Controller
{
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
    public function register()
    {
        return view('usuarios.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'email|unique:usuarios,email',
            'password' => 'min:8',
            'cpassword' => 'min:8|same:password',
        ];

        $messages = [
            'email.email' => 'El formato de su correo electrónico es inválido.',
            'email.unique' => 'Ya existe un usuario registrado con este correo electrónico.',
            'password.min' => 'La contraseña debe tener al menos 8 carácteres.',
            'cpassword.min' => 'La confirmación de la contraseña debe tener al menos 8 carácteres.',
            'cpassword.same' => 'Las contraseñas no coinciden.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else :
            $usuarios = new Usuario();
            $usuarios->nombre = $request->nombre;
            $usuarios->apellido = $request->apellido;
            $usuarios->direccion = $request->direccion;
            $usuarios->email = $request->email;
            $usuarios->password = Hash::make($request->password);

            $usuarios->save();
            return redirect(route('inicio'));
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(LoginUsuarioRequest $request)
    {
        $credenciales = $request->only('email', 'password');
        if (Auth::attempt($credenciales)) {
            //credenciales correctas
            return redirect()->route('inicio');
        } else {
            //credenciales incorrectas
            return redirect()->route('login');
        }
    }
}
