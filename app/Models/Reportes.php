<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    protected $table = "reportes";
    use HasFactory;
    protected $fillable = [
        "id",
        "motivo",
        "user_id",
        "publicacion_id",
    ];
}
