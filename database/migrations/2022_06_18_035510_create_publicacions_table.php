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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string("imagen")->nullable();
            $table->text("descripcion");
            $table->string("lugar_especifico")->nullable();
            $table->integer("estado");
            $table->integer("id_departamento");
            $table->integer("id_provincia");
            $table->integer("id_distrito");
            $table->unsignedBigInteger("usuario_id");
            $table->foreign("user_id")->references("id")->on("usuario");
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
        Schema::dropIfExists('publicacions');
    }
};
