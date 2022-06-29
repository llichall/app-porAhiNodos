<?php

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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string("nombres", 100);
            $table->string("apellidos", 100);
            $table->string("dni", 8);
            $table->string("nombre_usuario", 50);
            $table->integer("estado");
            $table->integer("id_departamento");
            $table->integer("id_provincia");
            $table->integer("id_distrito");
            $table->integer("id_user");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
