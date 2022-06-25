<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = "publicaciones";
    protected $fillable = [
        "publicaciones_id",
        "imagen",
        "descripcion",
        "lugar_especifico",
        "estado",
        "id_departamento",
        "id_provincia",
        "id_distrito",
        "usuario_id"
    ];
}
