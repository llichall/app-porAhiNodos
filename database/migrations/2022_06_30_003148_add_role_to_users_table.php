<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("nombres", 100);
            $table->string("apellidos", 100);
            $table->string("img", 180)->nullable();
            $table->integer("id_departamento")->nullable();
            $table->integer("id_provincia")->nullable();
            $table->integer("id_distrito")->nullable();
            // agregando estado a los usuairos, 1 activo, 0 aliminado
            $table->integer("estado");
            // creamos el "role_id" en este formato
            $table->unsignedBigInteger('role_id');
            // referenciamos
            $table->foreign('role_id')->references('id')->on('roles');
        });

        $admin = new User();
        $admin->nombres = "admin";
        $admin->apellidos = "admin";
        $admin->img = "default.png";
        $admin->name = "admin";
        $admin->email = "admin@admin.com";
        $admin->password = Hash::make('admin');
        $admin->estado = 1;
        $admin->role_id = 1; // admin
        $admin->email_verified_at = now();
        $admin->remember_token = Str::random(10);
        $admin->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // de esta forma desrreferenciamos el role_id
            $table->dropForeign('users_role_id_foreign');
            // de esta forma eliminamos el "role_id" luego de desrreferenciarlo
            $table->dropColumn('role_id');
        });
    }
};
