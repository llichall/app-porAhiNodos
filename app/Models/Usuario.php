<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = "usuario";
    protected $fillable = [
        "usuario_id",
        "nombres",
        "apellidos",
        "dni",
        "nombre_usuario",
        "password",
        "estado",
        "rol",
        "id_departamento",
        "id_provincia",
        "id_distrito"
    ];
}
