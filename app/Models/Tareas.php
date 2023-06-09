<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;
    protected $table = 'tareas';
    protected $primaryKey = 'tarCodigo'; //Llave primario de la tabla
    protected $fillable = ['tarNombre', 'tarDescripcion', 'tarEstado', 'tarFechaAsignada', 'tarFechaFinalizada', 'tarArea', 'tarEmpleado']; // campos para asignacion masiva
}
