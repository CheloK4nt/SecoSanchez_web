<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
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
            'email.email' => 'El formato de su correo electrónico es inválido.',
        ];

        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else :
            $correo = new ContactoMailable($request->all());
            Mail::to('mailpruebasecosanchez@gmail.com')->send($correo);

                /* $nombre = $_POST['nombre'];
                $asunto = "asunto";
                $mensaje = $_POST['mensaje'];
                $email = $_POST['email']; */
                /* $nombre = $request->nombre;
                $asunto = "prueba mail";
                $mensaje = $request->mensaje;
                $email = $request->email;

                $headers  = "MIME-Version: 1.0\r\n"; 
                $headers .= "From: Registro Royal Canin <programadorphp2017@gmail.com>\r\n"; 
                $headers .= "Reply-To: "; 
                $headers .= "Return-path:"; 
                $headers .= "Cc:"; 
                $headers .= "Bcc:"; 
                $mail = mail($email,$asunto,$mensaje,$header);

                if($mail){
                    echo "¡Mail enviado exitosamente!";
                }
             */
            return redirect(route('inicio'));
        endif;
    }
}
