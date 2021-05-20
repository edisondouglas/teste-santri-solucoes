<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin123',
        ]);
        DB::table('authorizations')->insert([
            'user_id' => 1,
            'chave_autorizacao' => 'cadastrar_clientes'
        ]);
        DB::table('authorizations')->insert([
            'user_id' => 1,
            'chave_autorizacao' => 'excluir_clientes'
        ]);
        DB::table('users')->insert([
            'name' => 'usuario',
            'email' => 'usuario@usuario.com',
            'password' => 'usuario123',
            'ativo' => 'N'
        ]);
        DB::table('users')->insert([
            'name' => 'usuario2',
            'email' => 'usuario2@usuario.com',
            'password' => 'usuario123',
        ]);
    }
}
