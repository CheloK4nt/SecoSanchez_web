<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Spray extends Model
{
    use HasFactory;
    use SoftDeletes;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = "sprays";
    protected $primaryKey = "id_spray";
    public $incrementing = false;
    public $timestamps = false;
}


