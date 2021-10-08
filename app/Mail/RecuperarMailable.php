<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RecuperarMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Recuperación de contraseña";
    public $contactoRecuperar;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /* $nombre = DB::select('SELECT nombre FROM usuarios WHERE email = "gerardo.pincheira.98@gmail.com"'); */
        
        /* $nombre = DB::table('usuarios')->select('nombre')->where('email',$request->input('email'))->get(); */
        /* $nombre = DB::table('usuarios')->select('nombre')->where('email','=','gerardo.pincheira.98@gmail.com')->get(); */
        
        /* $data = ['nombre'=>$nombre];
        $nom = $nombre -> nombre; */
        /* dd($nombre); */
        /* $code = rand(100000, 999999);
        $email = DB::table('usuarios')->select('email')->where('email',$request->input('email'))->get(); */
        /* return $this->view('emails.user_password_recover',compact('nombre','email','code'))->with('success','mensaje'); */
        return $this->view('emails.user_password_recover')
                    ->with($this->data);
                    
    }
}
