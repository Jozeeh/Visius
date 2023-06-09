<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'rolCodigo'; //Llave primario de la tabla
    protected $fillable = ['rolNombre']; // campos para asignacion masiva
}
