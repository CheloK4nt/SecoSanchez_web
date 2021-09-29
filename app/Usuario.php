<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticable
{
    use Notifiable;
    protected $table = "usuarios";
    protected $primaryKey = "email";
    public $keyType = 'string';
}
