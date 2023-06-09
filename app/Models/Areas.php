<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $primaryKey = 'arCodigo'; //Llave primario de la tabla
    protected $fillable = ['arNombre']; // campos para asignacion masiva
}
