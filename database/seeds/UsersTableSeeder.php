<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
            'identificacion'=>'123456789',
            'name' => 'Admin',
            'apellido1' => 'admin',
            'apellido2' => 'admin',
            'fechaNacimiento' => '01/01/2019',
            'email' => 'admin@gmail.com',
            'celular' => '88888888',
            'idRole' => '1',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);*/

        $user= new \App\User();
        $user->identificacion = '123456789';
        $user->name = 'Admin';
        $user->apellido1 = 'Admin';
        $user->apellido2 = 'Admin';
        $user->fechaNacimiento='01/01/2019';
        $user->email = 'admin@gmail.com';
        $user->celular = '88888888';
        $user->idRole = 1;
        $user->password= Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
    }
}
