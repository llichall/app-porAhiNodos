<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguidores extends Model
{
    use HasFactory;
    protected $table = "seguidores";
    protected $fillable = [
        "seguidores_id",
        "uusuario_id",
        "usuario_seguidor_id"
    ];
}
