<?php

use App\Models\Distrito;
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
        Schema::create('distrito', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 50);
            $table->unsignedBigInteger("provincia_id");
            $table->foreign("provincia_id")->references("id")->on("provincia");
            $table->timestamps();
        });
        $distrito = new Distrito();
        $distrito->nombre = "Huánuco";
        $distrito->provincia_id = 1;
        $distrito->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distrito');
    }
};
