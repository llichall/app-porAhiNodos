<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = "departamento";
    protected $fillable = [
        "departamento_id",
        "nombre"
    ];

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, "departamento_id", "departamento_id");
    }
}
