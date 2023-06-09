<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $primaryKey = 'empCodigo'; //Llave primario de la tabla
    protected $fillable = ['empNombre', 'empArea', 'empUser','empSupervisor']; // campos para asignacion masiva
}
