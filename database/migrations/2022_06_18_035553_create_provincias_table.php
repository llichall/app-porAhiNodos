<?php

use App\Models\Provincia;
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
        Schema::create('provincia', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 50);
            $table->unsignedBigInteger("departamento_id");
            $table->foreign("departamento_id")->references("id")->on("departamento");
            $table->timestamps();
        });

        $provincia = new Provincia();
        $provincia->nombre = "Huánuco";
        $provincia->departamento_id = 1;
        $provincia->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincia');
    }
};
