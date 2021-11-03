<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Galeria;

class Dossier extends Model
{
    /* use SoftDeletes; */
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = "dossier";
    protected $primaryKey = "id_dossier";
    public $fillable = ['nom_dossier'];
    public $incrementing = false;
    public $timestamps = false;


    public function getGaleria(){
        return $this->hasMany(Galeria::class, 'prod_id', 'id_dossier');
    }
}
