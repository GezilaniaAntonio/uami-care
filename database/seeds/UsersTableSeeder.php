<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Administrador',
                'email' => 'admin@uamicare.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'remember_token' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Funcionário',
                'email' => 'admin@employee.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('admin123'),
                'role' => 'employee',
                'remember_token' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Cliente',
                'email' => 'admin@client.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('admin123'),
                'role' => 'client',
                'remember_token' => NULL,
            ),
        ));
    }
}
