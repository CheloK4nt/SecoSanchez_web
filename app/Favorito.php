<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $table = 'usuario_favoritos';
    public $timestamps = false;
}
