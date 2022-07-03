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
        "user_id"
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, "id_departamento", "id");
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, "id_provincia", "id");
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class, "id_distrito", "id");
    }
}
