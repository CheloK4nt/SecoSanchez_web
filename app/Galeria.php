<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeria extends Model
{
    use SoftDeletes;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = "galerias";
    protected $primaryKey = "id_gal";
    public $incrementing = false;
    public $timestamps = false;
}
