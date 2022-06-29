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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("rol");
            // creamos el "role_id" en este formato
            $table->unsignedBigInteger('role_id');
            // referenciamos
            $table->foreign('role_id')->references('id')->on('roles');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        
        Schema::table('users', function (Blueprint $table) {
            // de esta forma desrreferenciamos el role_id
            $table->dropForeign('users_role_id_foreign');
            // de esta forma eliminamos el "role_id" luego de desrreferenciarlo
            $table->dropColumn('role_id');
        });
    }
};
