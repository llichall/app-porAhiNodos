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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string("motivo", 255);
            $table->integer("user_id"); // usuario quien hizo el reporte
            $table->unsignedBigInteger("publicacion_id"); // id de la publicacion reportada
            $table->foreign('publicacion_id')
                ->references('id')->on('publicaciones');
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
        Schema::create('reportes', function (Blueprint $table) {
            $table->dropForeign("publicaion_id");
        });
        Schema::dropIfExists('reportes');
    }
};
