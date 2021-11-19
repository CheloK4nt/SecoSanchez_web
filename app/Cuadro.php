<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cuadro extends Model
{
    use HasFactory;
    use SoftDeletes;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = "cuadros";
    protected $primaryKey = "id_cuadro";
    public $incrementing = false;
    public $timestamps = false;
}