<?php

use App\Models\Rol;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("rol", 30);
            $table->timestamps();
        });

        $data = array(
            [
                "rol" => "admin"
            ],
            [
                "rol" => "user"
            ]
        );
        foreach($data as $d)
        {
            $rol = new Rol();
            $rol->rol = $d["rol"];
            $rol->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};

