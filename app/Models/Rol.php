<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rol extends Model
{
    protected $table = "roles";
    protected $fillable = [
        "id",
        "rol",
    ];
    use HasFactory;

    // public function users(): HasMany
    // {
    //     return $this->hasMany(User::class);
    // }
}
