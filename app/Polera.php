<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Polera extends Model
{
    use HasFactory;
    use SoftDeletes;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = "poleras";
    protected $primaryKey = "id_polera";
    public $incrementing = false;
    public $timestamps = false;
}
