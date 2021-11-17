<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','email']);
    }

    public function index(){
        return view('home.contacto');
    }

    public function email(Request $request)
    {
        $rules = [
            'email' => 'email',
            'telefono' => 'min:9',
        ];

        $messages = [
            'email.email' => __('messages.formatoemail'),
        ];

        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', __('messages.sehaproducido'))->with('typealert', 'danger');
        else :
            $correo = new ContactoMailable($request->all());
            Mail::to('gerardo.pincheira.98@gmail.com')->send($correo);
            return redirect(route('contacto.index'))->with('success','mensaje');//,'Mensaje enviado');
        endif;
    }
}
