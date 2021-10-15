<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Categoria;
use App\Galeria;

class Producto extends Model
{
    use SoftDeletes;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = "productos";
    protected $primaryKey = "id_prod";
    public $fillable = ['nom_prod'];
    public $incrementing = false;
    public $timestamps = false;


    //Aqui intento hacer la relacion para tener acceso al atributo NOMBRE de la categoria correspondiente//
    public function categoria(){
        return $this->hasOne(Categoria::class, 'id_cat', 'cat_prod');
    }

    public function getGaleria(){
        return $this->hasMany(Galeria::class, 'prod_id', 'id_prod');
    }
}
