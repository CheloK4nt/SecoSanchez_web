<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;
    protected $primaryKey = "id_favoritos";
    protected $table = 'usuario_favoritos';
    public $timestamps = false;
}
