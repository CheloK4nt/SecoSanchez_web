<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table ="categorias";
    protected $primaryKey = "id_cat";
    public $fillable = ['nom_cat'];
    public $incrementing = false;
    public $timestamps = false;
}
