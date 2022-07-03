<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => Hash::make('admin'),
            "remember_token" => Str::random(10),
            'nombres' => "admin",
            'apellidos' => "admin",
            "estado" => 1,
            "role_id" => 1 // admin
        ]);
    }
}
