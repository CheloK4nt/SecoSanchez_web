<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Validator;
use Str;
use App\Mail\RecuperarMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['login','register', 'store','recuperar','postRecuperar','reset','postReset']);
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
            'email' => 'unique:usuarios,email',
            'password' => 'min:8',
            'cpassword' => 'min:8|same:password',
        ];

        $messages = [
            // 'email.email' => 'El formato de su correo electrónico es inválido.',
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
            $usuarios->telefono = $request->telefono;
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
            if (Auth::user()->tipo=="A") {
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('inicio');
            }
            
        } else {
            //credenciales incorrectas
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('inicio');
    }

    public function recuperar()
    {
        return view('usuarios.recuperar');
    }

    public function postRecuperar(Request $request)
    {
        $rules = [
            'email' => 'email',
        ];

        $messages = [
            'email.email' => 'El formato de su correo electrónico es inválido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator);
        else :
            $usuarios = Usuario::where('email',$request->input('email'))->count();
            if($usuarios == "1"):
                $usuarios = Usuario::where('email',$request->input('email'))->first();
                $code = rand(100000, 999999);
                $data = ['nombre' => $usuarios->nombre,'email'=>$usuarios->email,'code'=>$code];

                $u = Usuario::find($usuarios->email);
                $u->password_code = $code;
                if($u->save()):
                    /* $correo = new RecuperarMailable($request->all()); */
                    Mail::to($usuarios->email)->send(new RecuperarMailable($data));
                    return redirect('/reset?email='.$usuarios->email)->with('success','mensaje');
                endif;
            else:
                return back()->with('message','Este correo electrónico NO existe.')->with('typealert','danger');
            endif;
        endif;
    }

    public function reset(Request $request){
        $data = ['email'=>$request->get('email')];
        return view('usuarios.reset',$data);
    }

    public function postReset(Request $request){
        $rules = [
            'email' => 'email',
        ];

        $messages = [
            'email.email' => 'El formato de su correo electrónico es inválido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else :
            $usuarios = Usuario::where('email',$request->input('email'))->where('password_code',$request->input('code'))->count();
            if($usuarios == "1"):
                $usuarios = Usuario::where('email',$request->input('email'))->first();
                $new_password = DB::table('usuarios')->select('password_code')->where('password_code',$request->input('code'))->get();
                /* DB::table('usuarios')->select('email')->where('email',$request->input('email'))->get(); */ 
                foreach ($new_password as $np) {
                    $usuarios->password = Hash::make($np->password_code);
                }
                $usuarios->password_code = null;
                $usuarios->save();
                return redirect('/login')->with('success','mensaje');/* ->with('message','La contraseña fue restablecida con éxito, ahora puede iniciar sesión,')->with('typealert','success'); */
                /* if($usuarios->save()):
                    return redirect('/login')->with('message','La contraseña fue restablecida con éxito, ahora puede iniciar sesión,')->with('typealert','success');
                endif; */
            else:
                return back()->with('message','El código de recuperación es incorrecto')->with('typealert','danger');
            endif;
        endif;
    }
}
